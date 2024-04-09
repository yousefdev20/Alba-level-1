<?php

include_once __DIR__ . '/../../Models/Project.php';
include_once __DIR__ . '/../../Models/Service.php';
include_once __DIR__ . '/../../../system/Core/Controller/BaseController.php';

class AppController extends BaseController
{
    public function index(): void
    {
        $servicesOffered = Service::query()
            ->latest()
            ->where(['section' => 'services_offered'])
            ->select(columns: ['*'])
            ->limit(15)
            ->get();

        $projectServices = Project::query()
            ->latest('projects.id')
            ->where(['services.section' => 'portfolios'])
            ->with([
                ['first_table' => 'projects_services', 'second_table' => 'projects', 'first_key' => 'project_id', 'second_key' => 'id'],
                ['first_table' => 'services', 'second_table' => 'projects_services', 'first_key' => 'id', 'second_key' => 'service_id'],
            ])
            ->select(
            columns: [
                'projects.id', 'projects.name', 'projects.image', 'projects.title', 'projects.description',
                'services.title', 'services.image', 'services.description'
            ],
        )->limit(15)
            ->get();

        foreach ($projectServices as $project) {
            $projectId = $project[0];
            if (!isset($projects[$projectId])) {
                $projects[$projectId] = [
                    'id' => $project[0],
                    'name' => $project[1],
                    'image' => $project[2],
                    'title' => $project[3],
                    'description' => $project[4],
                    'services' => []
                ];
            }
            if ($project[5] || $project[6] || $project[7]) {
                $projects[$projectId]['services'][] = [
                    'title' => $project[5], 'image' => $project[6], 'description' => $project[7]
                ];
            }
        }

        view('index', compact(['servicesOffered', 'projects']));
    }
}