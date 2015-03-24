<?php


namespace Application\Entities;


/**
 * @Entity @Table(name="classroom")
 **/
class Classroom
{
    /** @Id @Column(type="integer") @GeneratedValue * */
    protected $id;
    /** @Column(type="integer") * */
    protected $refUia;
    /** @Column(type="string") * */
    protected $label;
}