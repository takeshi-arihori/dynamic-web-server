<?php

namespace Models\User;

use DateTime;
use Interfaces\FileConvertible;

class Employee extends User implements FileConvertible
{
  private string $jobTitle;
  private float $salary;
  private DateTime $startDate;
  private array $awards;

  public function __construct(
    int $id,
    string $firstName,
    string $lastName,
    string $email,
    string $password,
    string $phoneNumber,
    string $address,
    DateTime $birthDate,
    DateTime $membershipExpirationDate,
    string $role,
    string $jobTitle,
    float $salary,
    DateTime $startDate,
    array $awards
  ) {
    parent::__construct(
      $id,
      $firstName,
      $lastName,
      $email,
      $password,
      $phoneNumber,
      $address,
      $birthDate,
      $membershipExpirationDate,
      $role
    );
    $this->jobTitle = $jobTitle;
    $this->salary = $salary;
    $this->startDate = $startDate;
    $this->awards = $awards;
  }

  public function displayEmployeeDetails(): string
  {
    return sprintf(
      "Job Title: %s\nSalary: %.2f\nStart Date: %s\nAwards: %s\n",
      $this->jobTitle,
      $this->salary,
      $this->startDate->format('Y-m-d'),
      implode(", ", $this->awards)
    );
  }

  public function toString(): string
  {
    return parent::toString() . sprintf(
      "Job Title: %s\nSalary: %.2f\nStart Date: %s\nAwards: %s\n",
      $this->jobTitle,
      $this->salary,
      $this->startDate->format('Y-m-d'),
      implode(", ", $this->awards)
    );
  }

  public function toHTML(): string
  {
    return parent::toHTML() . sprintf(
      "<p>Job Title: %s</p>
            <p>Salary: %.2f</p>
            <p>Start Date: %s</p>
            <p>Awards: %s</p>",
      $this->jobTitle,
      $this->salary,
      $this->startDate->format('Y-m-d'),
      implode(", ", $this->awards)
    );
  }

  public function toMarkdown(): string
  {
    return parent::toMarkdown() . "
                 - Job Title: {$this->jobTitle}
                 - Salary: {$this->salary}
                 - Start Date: {$this->startDate->format('Y-m-d')}
                 - Awards: " . implode(", ", $this->awards);
  }

  public function toArray(): array
  {
    return array_merge(parent::toArray(), [
      'jobTitle' => $this->jobTitle,
      'salary' => $this->salary,
      'startDate' => $this->startDate->format('Y-m-d'),
      'awards' => $this->awards
    ]);
  }
}
