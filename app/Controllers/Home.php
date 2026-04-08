<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected function render(string $view, array $data = [])
    {
        $settingModel = new \App\Models\SettingModel();
        $settings = $settingModel->getAll();
        
        $data['settings'] = $settings;
        $data['title'] = $data['title'] ?? ($settings['school_name'] ?? 'Prottasha Academic High School');
        $data['content'] = view($view, $data);
        return view('layouts/main', $data);
    }

    public function index()
    {
        $noticeModel = new \App\Models\NoticeModel();
        $data['recentNotices'] = $noticeModel->where('status', 'active')->orderBy('publish_date', 'DESC')->limit(3)->findAll();
        
        return $this->render('homepage', array_merge($data, ['title' => 'Home - Prottasha Academic']));
    }

    public function about()
    {
        return $this->render('about', ['title' => 'About Us - Prottasha Academic']);
    }

    public function teachers()
    {
        $teacherModel = new \App\Models\TeacherModel();
        $data['teachers'] = $teacherModel->where('status', 'active')->orderBy('display_order', 'ASC')->findAll();
        $data['departments'] = array_unique(array_filter(array_column($data['teachers'], 'department')));

        return $this->render('teachers', array_merge($data, ['title' => 'Teachers Directory - Prottasha Academic']));
    }

    public function admission()
    {
        $admissionModel = new \App\Models\AdmissionInfoModel();
        $data['admission'] = $admissionModel->first(); // Usually only one record for current admission cycle

        return $this->render('admission', array_merge($data, ['title' => 'Admission Portal - Prottasha Academic']));
    }

    public function notices()
    {
        $noticeModel = new \App\Models\NoticeModel();
        $catModel    = new \App\Models\NoticeCategoryModel();
        
        $categoryId = $this->request->getGet('category');
        $builder = $noticeModel->where('status', 'active');
        if ($categoryId) {
            $builder->where('category_id', $categoryId);
        }
        
        $data['notices'] = $builder->orderBy('publish_date', 'DESC')->paginate(10);
        $data['pager']   = $noticeModel->pager;
        $data['categories'] = $catModel->where('status', 'active')->findAll();
        
        return $this->render('notices', array_merge($data, ['title' => 'Notice Board - Prottasha Academic']));
    }

    public function notice_details(int $id = null)
    {
        if (!$id) $id = $this->request->getGet('id');
        $noticeModel = new \App\Models\NoticeModel();
        $notice = $noticeModel->find($id);
        
        if (!$notice) {
            return redirect()->to(base_url('notices'))->with('error', 'Notice not found.');
        }
        
        return $this->render('notice_details', [
            'notice' => $notice,
            'title'  => $notice['title'] . ' - Prottasha Academic'
        ]);
    }

    public function contact()
    {
        return $this->render('contact', ['title' => 'Contact Us - Prottasha Academic']);
    }

    public function results()
    {
        $resultModel = new \App\Models\ResultModel();

        $allResults = $resultModel->orderBy('session_year', 'DESC')->findAll();

        $data['boardResults'] = array_filter($allResults, function ($r) {
            return ($r['exam_type'] ?? '') === 'board';
        });

        $data['internalResults'] = array_filter($allResults, function ($r) {
            return ($r['exam_type'] ?? '') === 'internal';
        });

        // Extract filters for the UI
        $data['years'] = array_unique(array_column($allResults, 'session_year'));
        $data['classes'] = array_unique(array_column($allResults, 'class_name'));

        return $this->render('results', array_merge($data, ['title' => 'Results Archive - Prottasha Academic']));
    }

    public function routines()
    {
        return $this->render('routines', ['title' => 'Academic Routines - Prottasha Academic']);
    }

    public function gallery()
    {
        $albumModel = new \App\Models\GalleryAlbumModel();
        $data['albums'] = $albumModel->where('status', 'active')->orderBy('event_date', 'DESC')->findAll();
        
        // Add image counts
        $imageModel = new \App\Models\GalleryImageModel();
        foreach ($data['albums'] as &$album) {
            $album['image_count'] = $imageModel->where('album_id', $album['id'])->countAllResults();
        }

        return $this->render('gallery', array_merge($data, ['title' => 'Photo Gallery - Prottasha Academic']));
    }

    public function downloads()
    {
        return $this->render('downloads', ['title' => 'Downloads Center - Prottasha Academic']);
    }

    public function academic_info()
    {
        $data = $this->getAcademicCalendarData();

        if ($this->request->isAJAX() && $this->request->getGet('fragment') === 'calendar') {
            return $this->response->setJSON([
                'html' => view('partials/academic_calendar_section', $data),
                'monthLabel' => date('F Y', mktime(0, 0, 0, $data['cal_month'], 1, $data['cal_year'])),
                'year' => $data['cal_year'],
                'month' => $data['cal_month'],
            ]);
        }

        return $this->render('academic_info', array_merge($data, [
            'title' => 'Academic Information - Prottasha Academic',
        ]));
    }

    public function administration()
    {
        return $this->render('administration', ['title' => 'Institutional Leadership - Prottasha Academic']);
    }

    protected function getAcademicCalendarData(): array
    {
        $eventModel = new \App\Models\AcademicCalendarModel();

        $year  = (int) ($this->request->getGet('year') ?? date('Y'));
        $month = (int) ($this->request->getGet('month') ?? date('n'));

        if ($month < 1) {
            $month = 12;
            $year--;
        }
        if ($month > 12) {
            $month = 1;
            $year++;
        }

        return [
            'cal_year' => $year,
            'cal_month' => $month,
            'cal_events' => $eventModel->where("strftime('%Y', event_date)", (string)$year)
                                      ->where("strftime('%m', event_date)", sprintf('%02d', $month))
                                      ->findAll(),
            'upcoming' => $eventModel->where('event_date >=', date('Y-m-d'))
                                     ->orderBy('event_date', 'ASC')
                                     ->limit(5)
                                     ->findAll(),
        ];
    }
}
