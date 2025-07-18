<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function get(Request $request)
    {
        $agents = Agent::all();
        return $this->responseJson($agents);
    }

    public function create(Request $request)
    {
        $new_agent = Agent::create([
            'name' => 'gemini coder',
            'provider' => 'disney',
        ]);

        return $this->responseJson($new_agent, status: 201);
    }
}
