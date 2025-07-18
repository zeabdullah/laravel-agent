<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AgentService;

class AgentController extends Controller
{
    public function create(Request $request)
    {
        $new_agent = AgentService::createAgent($request);
        return $this->responseJson($new_agent, status: 201);
    }

    public function get(Request $request)
    {
        $agents = AgentService::getAllAgents();
        return $this->responseJson($agents);
    }

    public function getByProvider(Request $request)
    {
        $agents = AgentService::getAgentsByProvider($request);
        return $this->responseJson($agents);
    }

    public function getExceptGoogle()
    {
        $allAgentsExceptGoogle = AgentService::getAllAgentsExceptGoogle();
        return $this->responseJson($allAgentsExceptGoogle);
    }

    public function listAgentNames(Request $request)
    {
        $agent_names = AgentService::getAgentNames();
        return $this->responseJson($agent_names);
    }

    /**
     * Change the agent provider to Groq 👀
     */
    public function groqify(Request $request, string $id)
    {
        $agent = AgentService::groqifyAgent($id);

        if (!$agent) {
            return $this->responseJson(null, status: 'agent not found', status_code: 404);
        }

        return $this->responseJson($agent);
    }
}
