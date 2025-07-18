<?php

namespace App\Services;

use App\Models\Agent;

class AgentService
{
    public static function createAgent($data)
    {
        return Agent::create([
            'name' => $data['name'],
            'provider_name' => $data['provider_name'],
            'input_tokens_per_unit_cost' => $data['input_tokens_per_unit_cost'],
            'output_tokens_per_unit_cost' => $data['output_tokens_per_unit_cost'],
        ]);
    }

    public static function getAgentNames()
    {
        $agent_names = [];
        foreach (Agent::all() as $agent)
            $agent_names[] = $agent->name;

        return $agent_names;
    }

    public static function getAllAgents()
    {
        return Agent::all();
    }
}
