<?php namespace Demo\HRClasses;

use Demo\Persons\Student;

/**
 * Class CMGTClass
 */
class CMGTClass implements HRClass
{
    public string $name = 'Advanced Group';
    public string $slogan = 'We rock!';
    private array $students = [];
    public const MAX_STUDENTS = 25;

    /**
     * @return Student[]
     */
    public function getStudents(): array
    {
        return $this->students;
    }

    /**
     * Retrieve raw array value & pass to Student object
     *
     * @param array $value
     * @throws \Exception
     */
    public function addStudent(array $value): void
    {
        $this->students[] = new Student($value['name'], $value['number'], $value['classNumber']);

        if ($this->getTotalStudents() > self::MAX_STUDENTS) {
            throw new \Exception('Too many students!');
        }
    }

    /**
     * @return int
     */
    public function getTotalStudents(): int
    {
        return count($this->students);
    }
}
