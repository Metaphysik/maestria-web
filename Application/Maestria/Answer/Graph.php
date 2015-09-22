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
    public function getOutput($uid)
    {


    }

    public function render()
    {
        $settings = array(
            'back_colour'          => '#eee',
            'stroke_colour'        => '#000',
            'back_stroke_width'    => 0,
            'back_stroke_colour'   => '#eee',
            'axis_colour'          => '#333',
            'axis_overlap'         => 2,
            'axis_font'            => 'Georgia',
            'axis_font_size'       => 10,
            'grid_colour'          => '#666',
            'label_colour'         => '#000',
            'pad_right'            => 20,
            'pad_left'             => 20,
            'link_base'            => '/',
            'link_target'          => '_top',
            'minimum_grid_spacing' => 20
        );

        $values         = array('Dough' => 50, 'Ray' => 100, 'Me' => 25, 'So' => 25, 'Far' => 45, 'Lard' => 35);
        $graph          = new \SVGGraph(300, 200, $settings);
        $graph->colours = array('#FFDD00');

        $graph->Values($values);
        $graph->Render('BarGraph');
    }
}