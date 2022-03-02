<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Modules\FrontendManage\Entities\PrivacyPolicy;

class PrivacyPageSection extends Component
{
    public $privacy_policy;

    public function __construct($privacy)
    {
        $this->privacy_policy = $privacy;
    }


    public function render()
    {
        return view(theme('components.privacy-page-section'));
    }
}
