<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected function render(string $view, array $data = [])
    {
        $data['title'] = $data['title'] ?? 'Prottasha Academic High School';
        $data['content'] = view($view, $data);
        return view('layouts/main', $data);
    }

    public function index()
    {
        return $this->render('homepage', ['title' => 'Home - Prottasha Academic']);
    }

    public function about()
    {
        return $this->render('about', ['title' => 'About Us - Prottasha Academic']);
    }

    public function teachers()
    {
        $teacherModel = new \App\Models\TeacherModel();
        $data['teachers'] = $teacherModel->orderBy('id', 'ASC')->findAll();
        $data['departments'] = array_unique(array_column($data['teachers'], 'department'));

        return $this->render('teachers', array_merge($data, ['title' => 'Teachers Directory - Prottasha Academic']));
    }

    public function admission()
    {
        return $this->render('admission', ['title' => 'Admission Portal - Prottasha Academic']);
    }

    public function notices()
    {
        return $this->render('notices', ['title' => 'Notice Board - Prottasha Academic']);
    }

    public function notice_details()
    {
        return $this->render('notice_details', ['title' => 'Notice Details - Prottasha Academic']);
    }

    public function contact()
    {
        return $this->render('contact', ['title' => 'Contact Us - Prottasha Academic']);
    }

    public function results()
    {
        $resultModel = new \App\Models\ResultModel();

        $allResults = $resultModel->orderBy('year', 'DESC')->findAll();

        $data['boardResults'] = array_filter($allResults, function ($r) {
            return $r['exam_type'] === 'board';
        });

        $data['internalResults'] = array_filter($allResults, function ($r) {
            return $r['exam_type'] === 'internal';
        });

        // Extract filters for the UI
        $data['years'] = array_unique(array_column($allResults, 'year'));
        $data['classes'] = array_unique(array_column($allResults, 'class_category'));

        return $this->render('results', array_merge($data, ['title' => 'Results Archive - Prottasha Academic']));
    }

    public function routines()
    {
        return $this->render('routines', ['title' => 'Academic Routines - Prottasha Academic']);
    }

    public function gallery()
    {
        $galleryModel = new \App\Models\GalleryModel();
        $data['images'] = $galleryModel->orderBy('created_at', 'DESC')->findAll();

        // Group by category for filtering if needed
        $data['categories'] = array_unique(array_column($data['images'], 'category'));

        return $this->render('gallery', array_merge($data, ['title' => 'Photo Gallery - Prottasha Academic']));
    }

    public function downloads()
    {
        return $this->render('downloads', ['title' => 'Downloads Center - Prottasha Academic']);
    }

    public function academic_info()
    {
        $eventModel = new \App\Models\AcademicEventModel();

        $year  = (int) ($this->request->getGet('year')  ?? date('Y'));
        $month = (int) ($this->request->getGet('month') ?? date('n'));

        // Keep month in valid range
        if ($month < 1) { $month = 12; $year--; }
        if ($month > 12) { $month = 1; $year++; }

        $data['cal_year']  = $year;
        $data['cal_month'] = $month;
        $data['cal_events'] = $eventModel->getByMonth($year, $month);
        $data['upcoming']   = $eventModel->getUpcoming(5);

        return $this->render('academic_info', array_merge($data, [
            'title' => 'Academic Information - Prottasha Academic',
        ]));
    }

    public function administration()
    {
        return $this->render('administration', ['title' => 'Institutional Leadership - Prottasha Academic']);
    }
}
