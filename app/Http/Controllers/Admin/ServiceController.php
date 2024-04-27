<?php

include_once __DIR__ . '/../../../../system/Core/Controller/BaseController.php';
include_once __DIR__ . '/../../Requests/StoreServiceRequest.php';

class ServiceController extends BaseController
{
    public function index(): void
    {
        $services = Service::query()->latest()->limit(15)->select(['*'])->get();

        view('admin/service/index', with: compact(['services']));
    }

    public function store(StoreServiceRequest $request): void
    {

        die($request->validated());
        $filename = str_replace(' ', '', basename($_FILES['image']['name']));
        $dir = "public/assets/projects/images";
        $tempFile = "$dir/$filename";

        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        move_uploaded_file($_FILES['image']['tmp_name'], $tempFile);

        Service::query()->insert($request->only(['section', 'title', 'description']) + [
            'image' => "projects/images/$filename",
        ]);

        redirect(route('admin.service.index'));
    }

    public function edit(Request $request): void
    {
        $service = Service::query()->where(['id' => $request->id])->select(['*'])->get();

        view('admin/service/edit', with: compact(['service']));
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

        Service::query()
            ->where(['id' => $request->id])
            ->update($request->only(['section', 'title', 'description']) + [
                    'image' => "projects/images/$filename",
            ]);

        redirect(route('admin.service.index'));
    }

    public function destroy(Request $request): void
    {
        Service::query()->where($request->only(['id']))->delete();

        redirect(route('admin.service.index'));
    }
}