<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SingleCourse extends Component
{
    private $course;

    public function __construct($course)
    {
        $this->course = $course;
    }


    public function render()
    {
        $course = $this->course;
        return view(theme('components.single-course'), compact('course'));
    }
}
