<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 22/09/15
 * Time: 22:26
 */

namespace Application\Maestria\Answer;


class Graph
{
    public function render($values)
    {
        $settings = array(

            'show_grid'         => false,
            'show_axes'         => false,
            'show_tooltips'     => false,
            'bar_space'         => 1,
            'bar_width'         => 8,
            'crosshairs'        => false,
            'division_style'    => 'none',
            'log_axis_y'        => false,
            'pad_top'           => 5,
            'pad_bottom'        => 5,
            'back_stroke_width' => 0,
            'stroke_width'      => 0
        );


        $graph          = new \SVGGraph(70, 30, $settings);
        $graph->colours = array('#FF0000', '#FFDD00');

        $graph->Values($values);
        return $graph->Fetch('BarGraph', false, false);
    }
}