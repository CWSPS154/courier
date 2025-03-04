<?php

/**
 * PHP Version 8.1.11
 * Laravel Framework 9.43.0
 *
 * @category Component
 *
 * @author CWSPS154 <codewithsps154@gmail.com>
 * @license MIT License https://opensource.org/licenses/MIT
 *
 * @link https://github.com/CWSPS154
 *
 * Date 11/12/22
 * */

namespace App\View\Components\Admin\Ui;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\View\Component;

class Select extends Component
{
    /**
     * @var string
     */
    public $label;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string|array|null
     */
    public $options;

    /**
     * @var string|null
     */
    public $addClass;

    /**
     * @var bool
     */
    public $disable;

    /**
     * @var bool
     */
    public $required;

    /**
     * @var bool
     */
    public $multiple;

    /**
     * @var string|null
     */
    public $value;

    /**
     * @var bool
     */
    public $default;

    /**
     * Create a new component instance.
     *
     * @param  string|array|null  $options
     */
    public function __construct(
        string $label,
        string $name,
        string $id,
        $options = null,
        string $addClass = null,
        bool $required = false,
        bool $disable = false,
        bool $multiple = false,
        string $value = null,
        string $default = '-- select --'
    ) {
        $this->label = $label;
        $this->name = $name;
        $this->id = $id;
        $this->options = $options;
        $this->addClass = $addClass;
        $this->required = $required;
        $this->disable = $disable;
        $this->multiple = $multiple;
        $this->value = $value;
        $this->default = $default;
        Log::debug($options);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('components.admin.ui.select');
    }
}
