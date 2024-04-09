<?php

include_once __DIR__ . '/../../../../system/Core/Controller/BaseController.php';

class AdminController extends BaseController
{
    public function index(): void
    {
        $projects = Project::query()->latest()->limit(15)->select(['*'])->get();

        view('admin/index', with: compact(['projects']));
    }

    public function store(Request $request): void
    {
        $filename = str_replace(' ', '', basename($_FILES['image']['name']));
        $dir = "public/assets/projects/images";
        $tempFile = "$dir/$filename";

        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        move_uploaded_file($_FILES['image']['tmp_name'], $tempFile);

        Project::query()->insert($request->only(['name', 'title', 'description']) + [
            'image' => "projects/images/$filename",
        ]);

        redirect(route('admin.index'));
    }

    public function edit(Request $request): void
    {
        $project = Project::query()->where(['id' => $request->id])->select(['*'])->get();

        view('admin/edit', with: compact(['project']));
    }

    public function update(Request $request): void
    {
        $filename = str_replace(' ', '', basename($_FILES['image']['name']));
        $dir = "public/assets/projects/images";
        $tempFile = "$dir/$filename";

        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        move_uploaded_file($_FILES['image']['tmp_name'], $tempFile);

        Project::query()
            ->where(['id' => $request->id])
            ->update($request->only(['name', 'title', 'description']) + [
                'image' => "projects/images/$filename",
            ]);

        redirect(route('admin.index'));
    }

    public function destroy(Request $request): void
    {
        Project::query()->where($request->only(['id']))->delete();

        redirect(route('admin.index'));
    }
}