<?php


function getDayName($day): string
{
    return [
        1 => 'Segunda-feira',
        2 => 'Terça-feira',
        3 => 'Quarta-feira',
        4 => 'Quinta-feira',
        5 => 'Sexta-Feira',
    ][$day];
}
