<?php

namespace Botble\RealEstate\Http\Controllers;

use Assets;
use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Forms\FormBuilder;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\RealEstate\Enums\ModerationStatusEnum;
use Botble\RealEstate\Forms\AccountConsultForm;
use Botble\RealEstate\Http\Requests\AccountConsultRequest;
use Botble\RealEstate\Models\Account;
use Botble\RealEstate\Repositories\Interfaces\AccountActivityLogInterface;
use Botble\RealEstate\Repositories\Interfaces\AccountInterface;
use Botble\RealEstate\Repositories\Interfaces\ConsultInterface;
use Botble\RealEstate\Services\SaveFacilitiesService;
use Botble\RealEstate\Tables\AccountConsultTable;
use EmailHandler;
use Exception;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RealEstateHelper;
use SeoHelper;
use Theme;

class AccountConsultController extends Controller
{
    protected $accountRepository;
    protected $consultRepository;
    protected $activityLogRepository;

    public function __construct(
        Repository $config,
        AccountInterface $accountRepository,
        ConsultInterface $consultRepository,
        AccountActivityLogInterface $accountActivityLogRepository
    ) {
        $this->accountRepository = $accountRepository;
        $this->consultRepository = $consultRepository;
        $this->activityLogRepository = $accountActivityLogRepository;

        Assets::setConfig($config->get('plugins.real-estate.assets'));
    }

    public function index(Request $request, AccountConsultTable $consultTable)
    {
        SeoHelper::setTitle(trans('plugins/real-estate::account-consult.consults'));

        $user = auth('account')->user();

        if ($request->isMethod('get') && view()->exists(Theme::getThemeNamespace('views.real-estate.account.table.index'))) {
            return Theme::scope('real-estate.account.table.index', ['user' => $user, 'consultTable' => $consultTable])
                ->render();
        }

        return $consultTable->render('plugins/real-estate::account.table.base');
    }

    public function create(FormBuilder $formBuilder)
    {
    }

    public function store(
        AccountConsultRequest $request,
        BaseHttpResponse $response,
        AccountInterface $accountRepository,
        SaveFacilitiesService $saveFacilitiesService
    ) {
    }

    public function edit($id, FormBuilder $formBuilder, Request $request)
    {
    }

    public function update(
        $id,
        AccountConsultRequest $request,
        BaseHttpResponse $response,
        SaveFacilitiesService $saveFacilitiesService
    ) {
    }

    public function destroy($id, BaseHttpResponse $response)
    {
        $consult = $this->consultRepository->getFirstBy([
            'id' => $id,
            'author_id' => auth('account')->id(),
            'author_type' => Account::class,
        ]);

        if (! $consult) {
            abort(404);
        }

        $this->consultRepository->delete($consult);

        $this->activityLogRepository->createOrUpdate([
            'action' => 'delete_consult',
            'reference_name' => $consult->name,
        ]);

        return $response->setMessage(__('Delete consult successfully!'));
    }
}
