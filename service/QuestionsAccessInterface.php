<?php

interface QuestionsAccessInterface
{
    const DATABASE = "STORIES";

    public static function getQuestion(Array $A_values = null):?Question;

    public static function create(Array $A_values = null):bool;

    public static function checkIfExistsById(string $S_id = null):bool;

    public static function update(Array $A_values = null):array;
}