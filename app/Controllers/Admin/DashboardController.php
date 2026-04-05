<?php

namespace App\Controllers\Admin;

use App\Models\NoticeModel;
use App\Models\TeacherModel;
use App\Models\ResultModel;
use App\Models\RoutineModel;
use App\Models\DownloadModel;
use App\Models\GalleryAlbumModel;
use App\Models\ContactMessageModel;

class DashboardController extends AdminBaseController
{
    public function index()
    {
        $data = [
            'title'           => 'Dashboard',
            'totalNotices'    => (new NoticeModel())->countAll(),
            'totalTeachers'   => (new TeacherModel())->where('status','active')->countAllResults(),
            'totalResults'    => (new ResultModel())->countAll(),
            'totalRoutines'   => (new RoutineModel())->countAll(),
            'totalDownloads'  => (new DownloadModel())->countAll(),
            'totalGalleryAlbums' => (new GalleryAlbumModel())->countAll(),
            'unreadMessages'  => (new ContactMessageModel())->unreadCount(),
            'recentNotices'   => (new NoticeModel())->orderBy('created_at','DESC')->limit(5)->findAll(),
            'recentMessages'  => (new ContactMessageModel())->orderBy('created_at','DESC')->limit(5)->findAll(),
            'recentDownloads' => (new DownloadModel())->orderBy('created_at','DESC')->limit(5)->findAll(),
        ];
        return $this->adminView('admin/dashboard/index', $data);
    }
}
