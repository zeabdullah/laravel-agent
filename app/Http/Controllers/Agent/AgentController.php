<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AgentService;

class AgentController extends Controller
{
    public function get(Request $request)
    {
        $agents = AgentService::getAllAgents();
        return $this->responseJson($agents);
    }

    public function create(Request $request)
    {
        $new_agent = AgentService::createAgent($request);
        return $this->responseJson($new_agent, status: 201);
    }
}
