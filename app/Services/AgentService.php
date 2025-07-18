<?php

namespace App\Services;

use App\Models\Agent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

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

    public static function getAllAgents()
    {
        return Agent::all();
    }

    public static function setAgentsPricingToDouble()
    {
        Agent::chunk(100, function (Collection $agents) {
            foreach ($agents as $agent) {
                $agent->update([
                    'input_tokens_per_unit_cost' => $agent['input_tokens_per_unit_cost'] * 2,
                    'output_tokens_per_unit_cost' => $agent['output_tokens_per_unit_cost'] * 2,
                ]);
            }
        });

        return Agent::all();
    }

    public static function getAgentsByProvider(Request $data)
    {
        $provider_name = $data['provider_name'];

        $agents = Agent::whereLike('provider_name', "%$provider_name%")
            ->orderBy('provider_name', 'desc')
            ->limit(30)
            ->get();

        return $agents;
    }

    public static function getAllAgentsExceptGoogle()
    {
        $agents = Agent::all();
        $agents_without_google = $agents->reject(
            fn(Agent $agent) => $agent['provider_name'] === 'google'
        );
        return $agents_without_google;
    }

    public static function groqifyAgent(string $id)
    {
        $agent = Agent::where('ai_id', $id)->first();

        if (!$agent) {
            return null; // redundant but obvious
        }

        $agent->setAttribute('provider_name', 'groq'); // this updates the model w/o saving to the db

        // so this will not have groq as provider since we refresh
        // the model with data that is actually from the db
        return $agent->fresh();
    }

    public static function getAgentNames()
    {
        $agent_names = [];
        foreach (Agent::all() as $agent)
            $agent_names[] = $agent['name'];

        return $agent_names;
    }
}
