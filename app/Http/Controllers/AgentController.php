<?php

namespace App\Http\Controllers;

use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use App\Models\Agent;
use App\Models\City;
use App\Tables\AgentTable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentController extends BaseController
{
    public function index(AgentTable $dataTable)
    {
        PageTitle::setTitle('Agents');

        return $dataTable->renderTable();
    }


    public function create()
    {
        $agent = new Agent();

        $currentUrl = request()->url();
        $urlParts = explode('/', $currentUrl);
        $lastPart = end($urlParts);

        PageTitle::setTitle('Agents / Add Agent');

        $cities = City::all();

        return view('admin.agents.create', compact('agent', 'cities'));

    }

    public function store(Request $request, BaseHttpResponse $response)
    {
        $agent = new Agent();
        $agent->fill($request->all())->save();

        return $response
        ->setNextUrl(route('admin.zameenlocator.agents.index'))
        ->setMessage('Created successfully');
    }

    public function edit($id)
    {
        $agent = Agent::findOrFail($id);

        $currentUrl = request()->url();
        $urlParts = explode('/', $currentUrl);
        $lastPart = end($urlParts);

        PageTitle::setTitle('Agents / Edit Agent');

        $cities = City::all();

        return view('admin.agents.edit', compact('agent', 'cities'));
    }

    public function update($id, Request $request, BaseHttpResponse $response)
    {
        $agent = Agent::findOrFail($id);
        $agent->fill($request->all())->update();

        return $response
        ->setNextUrl(route('admin.zameenlocator.agents.index'))
        ->setMessage('Updated successfully');
    }

    public function updateStatus($id, Request $request, BaseHttpResponse $response)
    {
        $agent = Agent::findOrFail($id);

        if ($request->has('approve')) {
            $agent->status = 1;
        } elseif ($request->has('disapprove')) {
            $agent->status = 0; 
        }

        $agent->save();

        return $response
        ->setNextUrl(route('admin.zameenlocator.agents.index'))
        ->setMessage('Updated successfully');
    }


    public function destroy($id, Request $request, BaseHttpResponse $response)
    {
        try {
            $agent = Agent::findOrFail($id);

            $existingFile = public_path(Agent::AGENT_IMAGES_PATH.$agent->image);
            if (file_exists($existingFile))
                unlink($existingFile);
            
            $agent->delete();

            return $response->setMessage('Deleted successfully');
        } catch (Exception $exception) {
            return $response
            ->setError()
            ->setMessage($exception->getMessage());
        }
    }
}
