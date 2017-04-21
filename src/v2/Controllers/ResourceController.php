<?php

namespace ErpNET\Models\v2\Controllers;

use ErpNET\Models\v2\Interfaces\BaseRepository;
use ErpNET\Models\v2\Presenters\OrderPresenter;
use ErpNET\WidgetResource\Services\ErpnetWidgetService;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Validator\LaravelValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Contracts\View\Factory as ViewFactory;

abstract class ResourceController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var BaseRepository
     */
    protected $repository;

    /**
     * @var LaravelValidator
     */
    protected $validator;

    /**
     * Abstract to set and return route name
     * @return string
     */
    abstract protected function routeName();

    /**
     * Abstract to set and return fields configuration for view
     * @see \ErpNET\WidgetResource\Services\ErpnetWidgetService
     * @return array
     */
    abstract protected function fieldsConfig();

    /**
     * Abstract to set and return repository class
     * @return string
     */
    abstract protected function repositoryClass();

    /**
     * Controller constructor.
     * @param LaravelValidator $validator
     */
    public function __construct(LaravelValidator $validator)
    {
        $this->repository = app($this->repositoryClass());
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @param ViewFactory $view
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(ViewFactory $view)
    {
        $this->repository->pushCriteria(app(RequestCriteria::class));

        $paginate = $this->repository->paginate();

        if (is_object($paginate)) {
            $render = $paginate->render();
            $allData = $paginate->all();
        } elseif (is_array($paginate)){
            $render = null;
            $allData = $paginate['data'];
        }

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $allData,
            ]);
        }

        if (class_exists(ErpnetWidgetService::class)){
            $erpnetWidgetService = app(ErpnetWidgetService::class);
            return $erpnetWidgetService->widget(
                $allData,
                $this->repository->model(),
                $this->routeName(),
                $this->fieldsConfig(),
                'dataIndexLayout3',
                [
                    'showToAdmin' => true,
                    'render' => $render,
                ]
            );
        }

        if (! $view->exists($this->routeName().'.index'))
            return $view->make('welcome');
//            abort(403, 'View: '.$this->routeName().'.index não existe');
//            throw new \Exception('View: '.$this->routeName().'.index não existe');

        return $view->make($this->routeName().'.index', compact('allData'));
//        return view($this->routeName().'.index', compact('allData'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foundData = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $foundData,
            ]);
        }

        return view($this->routeName().'.show', compact('foundData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $foundData = $this->repository->find($id);

        return view($this->routeName().'.edit', compact('foundData'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Resource deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Resource deleted.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FormRequest $request
     *
     * @return \Illuminate\Http\Response | \Illuminate\Http\RedirectResponse
     */
    public function store(FormRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $createdData = $this->repository->create($request->all());

            $response = [
                'message' => 'Resource created.',
                'data'    => $createdData->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);

        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FormRequest $request
     * @param  string      $id
     *
     * @return \Illuminate\Http\Response | \Illuminate\Http\RedirectResponse
     */
    public function update(FormRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $updatedData = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'Resource updated.',
                'data'    => $updatedData->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);

        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }
}
