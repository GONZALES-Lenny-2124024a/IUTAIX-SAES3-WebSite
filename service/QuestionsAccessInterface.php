<?php

interface QuestionsAccessInterface
{
    const DATABASE = "STORIES";

    public static function checkIfExists(Array $A_values = null):bool;

    public static function select(string $S_id = null): array;

    public static function create(Array $A_values = null):array;

    public static function delete(string $S_id = null):array;

    public static function checkIfExistsById(string $S_id = null):bool;

    public static function update(Array $A_values = null):array;
}