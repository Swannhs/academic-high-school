<?php

namespace App\Controllers\Admin;

use App\Models\GalleryAlbumModel;
use App\Models\GalleryImageModel;

class GalleryController extends AdminBaseController
{
    private GalleryAlbumModel $albums;
    private GalleryImageModel $images;

    public function __construct()
    {
        $this->albums = new GalleryAlbumModel();
        $this->images = new GalleryImageModel();
    }

    public function index()
    {
        $this->requirePermission('manage_gallery');
        return $this->adminView('admin/gallery/index', [
            'title'  => 'Gallery Albums',
            'albums' => $this->albums->withImageCount(),
        ]);
    }

    public function create()
    {
        $this->requirePermission('manage_gallery');
        return $this->adminView('admin/gallery/create', ['title' => 'Create Album']);
    }

    public function store()
    {
        $this->requirePermission('manage_gallery');
        if (! $this->validate(['title' => 'required'])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $cover = $this->uploadFile('cover_image', 'gallery');
        $id = $this->albums->insert([
            'title'       => $this->request->getPost('title'),
            'category'    => $this->request->getPost('category'),
            'cover_image' => $cover,
            'event_date'  => $this->request->getPost('event_date'),
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status') ?: 'active',
        ], true);
        // Handle multiple image uploads
        $this->handleImageUploads((int)$id);
        return redirect()->to(base_url('admin/gallery'))->with('success', 'Album created.');
    }

    public function edit(int $id)
    {
        $this->requirePermission('manage_gallery');
        $album = $this->albums->find($id);
        if (! $album) return redirect()->to(base_url('admin/gallery'))->with('error', 'Not found.');
        $images = $this->images->where('album_id', $id)->orderBy('display_order','ASC')->findAll();
        return $this->adminView('admin/gallery/edit', [
            'title' => 'Edit Album', 'album' => $album, 'images' => $images,
        ]);
    }

    public function update(int $id)
    {
        $this->requirePermission('manage_gallery');
        $album = $this->albums->find($id);
        if (! $album) return redirect()->to(base_url('admin/gallery'))->with('error', 'Not found.');
        if (! $this->validate(['title' => 'required'])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $cover = $this->uploadFile('cover_image', 'gallery', $album['cover_image']);
        $this->albums->update($id, [
            'title'       => $this->request->getPost('title'),
            'category'    => $this->request->getPost('category'),
            'cover_image' => $cover,
            'event_date'  => $this->request->getPost('event_date'),
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status'),
        ]);
        $this->handleImageUploads($id);
        return redirect()->to(base_url('admin/gallery'))->with('success', 'Album updated.');
    }

    public function delete(int $id)
    {
        $this->requirePermission('manage_gallery');
        $album = $this->albums->find($id);
        if ($album) {
            $this->deleteFile('gallery', $album['cover_image']);
            $imgs = $this->images->where('album_id', $id)->findAll();
            foreach ($imgs as $img) { $this->deleteFile('gallery', $img['image_path']); }
            $this->images->where('album_id', $id)->delete();
            $this->albums->delete($id);
        }
        return redirect()->to(base_url('admin/gallery'))->with('success', 'Album deleted.');
    }

    public function deleteImage(int $imageId)
    {
        $this->requirePermission('manage_gallery');
        $img = $this->images->find($imageId);
        if ($img) { $this->deleteFile('gallery', $img['image_path']); $this->images->delete($imageId); }
        return redirect()->back()->with('success', 'Image deleted.');
    }

    private function handleImageUploads(int $albumId): void
    {
        $files = $this->request->getFiles();
        if (! empty($files['images'])) {
            foreach ($files['images'] as $file) {
                if ($file->isValid() && ! $file->hasMoved()) {
                    $allowed = ['jpg','jpeg','png','webp'];
                    if (in_array(strtolower($file->getClientExtension()), $allowed)) {
                        $name = $file->getRandomName();
                        $file->move(FCPATH . 'uploads/gallery', $name);
                        $this->images->insert(['album_id' => $albumId, 'image_path' => $name, 'created_at' => date('Y-m-d H:i:s')]);
                    }
                }
            }
        }
    }
}
