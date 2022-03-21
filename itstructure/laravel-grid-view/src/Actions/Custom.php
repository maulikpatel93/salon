<?php

namespace Itstructure\GridView\Actions;

/**
 * Class View.
 * @package Itstructure\GridView\Actions
 */
class Custom extends BaseAction
{
    const ACTION = 'custom';

    protected $button = "";
    protected $label = "";
    /**
     * @param $row
     * @param int $bootstrapColWidth
     * @return array|string
     */
    public function render($row, int $bootstrapColWidth = BaseAction::BOOTSTRAP_COL_WIDTH)
    {
        return view('grid_view::actions.' . self::ACTION, [
            'url' => $this->getUrl($row),
            'bootstrapColWidth' => $bootstrapColWidth,
            'htmlAttributes' => $this->buildHtmlAttributes(),
            'label' => $this->label,
            'button' => $this->button,
        ])->render();
    }

    /**
     * @param $row
     * @return string
     */
    protected function buildUrl($row)
    {
        return $this->getCurrentUrl() . '/' . $row->id . '/' . self::ACTION;
    }
}
