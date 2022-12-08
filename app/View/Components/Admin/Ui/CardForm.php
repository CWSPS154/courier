<?php

/**
 * PHP Version 7.4.25
 * Laravel Framework 8.83.18
 *
 * @category Component
 *
 * @package Laravel
 *
 * @author CWSPS154 <codewithsps154@gmail.com>
 *
 * @license MIT License https://opensource.org/licenses/MIT
 *
 * @link https://github.com/CWSPS154
 *
 * Date 28/08/22
 * */

namespace App\View\Components\Admin\Ui;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardForm extends Component
{
    /**
     * @var string
     */
    public $title;
    /**
     * @var string|null
     */
    public $smallTitle;
    /**
     * @var string
     */
    public $titleBgClass;
    /**
     * @var string|null
     */
    public $formRoute;
    /**
     * @var int|null
     */
    public $formRouteId;
    /**
     * @var string
     */
    public $formId;
    /**
     * @var string
     */
    public $formMethod;
    /**
     * @var string
     */
    public $formClass;
    /**
     * @var string|null
     */
    public $formName;
    /**
     * @var bool
     */
    public $enctype;
    /**
     * @var string|null
     */
    public $other;
    /**
     * @var bool
     */
    public $autocomplete;

    /**
     * Create a new component instance.
     *
     * @param string $title
     * @param string $formId
     * @param string|null $formName
     * @param string|null $smallTitle
     * @param string|null $formRoute
     * @param int|string|null $formRouteId
     * @param string $titleBgClass
     * @param string $formMethod
     * @param bool $enctype
     * @param bool $autocomplete
     * @param string $formClass
     * @param string|null $other
     */
    public function __construct(
        string $title,
        string $formId,
        string $formName = null,
        string $smallTitle = null,
        string $formRoute = null,
        int|string    $formRouteId = null,
        string $titleBgClass = 'card-primary',
        string $formMethod = 'POST',
        bool   $enctype = false,
        bool   $autocomplete = false,
        string $formClass = 'col-md-8',
        string $other = null
    ) {
        $this->title = $title;
        $this->formId = $formId;
        $this->formName = $formName;
        $this->smallTitle = $smallTitle;
        $this->formRoute = $formRoute;
        $this->formRouteId = $formRouteId;
        $this->titleBgClass = $titleBgClass;
        $this->formMethod = $formMethod;
        $this->enctype = $enctype;
        $this->autocomplete = $autocomplete;
        $this->formClass = $formClass;
        $this->other = $other;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('components.admin.ui.card-form');
    }
}
