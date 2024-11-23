<?php

namespace Models\User;

use DateTime;
use Interfaces\FileConvertible;

class User implements FileConvertible
{
  protected int $id;
  protected string $firstName;
  protected string $lastName;
  protected string $email;
  protected string $hashedPassword;
  protected string $phoneNumber;
  protected string $address;
  protected DateTime $birthDate;
  protected DateTime $membershipExpirationDate;
  protected string $role;

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
    string $role
  ) {
    $this->id = $id;
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->email = $email;
    $this->hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $this->phoneNumber = $phoneNumber;
    $this->address = $address;
    $this->birthDate = $birthDate;
    $this->membershipExpirationDate = $membershipExpirationDate;
    $this->role = $role;
  }

  public function login(string $password): bool
  {
    // Validate password with the hashed password
    return password_verify($password, $this->hashedPassword);
  }

  public function updateProfile(string $address, string $phoneNumber): void
  {
    $this->address = $address;
    $this->phoneNumber = $phoneNumber;
  }

  public function renewMembership(DateTime $newExpirationDate): void
  {
    $this->membershipExpirationDate = $newExpirationDate;
  }

  public function changePassword(string $newPassword): void
  {
    $this->hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
  }

  public function hasMembershipExpired(): bool
  {
    $currentDate = new DateTime();
    return $currentDate > $this->membershipExpirationDate;
  }

  public function toString(): string
  {
    return sprintf(
      "User ID: %d\nName: %s %s\nEmail: %s\nPhone Number: %s\nAddress: %s\nBirth Date: %s\nMembership Expiration Date: %s\nRole: %s\n",
      $this->id,
      $this->firstName,
      $this->lastName,
      $this->email,
      $this->phoneNumber,
      $this->address,
      $this->birthDate->format('Y-m-d'),
      $this->membershipExpirationDate->format('Y-m-d'),
      $this->role
    );
  }

  public function toHTML(): string
  {
    return sprintf(
      "
            <div class='user-card'>
                <div class='avatar'>SAMPLE</div>
                <h2>%s %s</h2>
                <p>%s</p>
                <p>%s</p>
                <p>%s</p>
                <p>Birth Date: %s</p>
                <p>Membership Expiration Date: %s</p>
                <p>Role: %s</p>
            </div>",
      $this->firstName,
      $this->lastName,
      $this->email,
      $this->phoneNumber,
      $this->address,
      $this->birthDate->format('Y-m-d'),
      $this->membershipExpirationDate->format('Y-m-d'),
      $this->role
    );
  }

  public function toMarkdown(): string
  {
    return "## User: {$this->firstName} {$this->lastName}
                 - Email: {$this->email}
                 - Phone Number: {$this->phoneNumber}
                 - Address: {$this->address}
                 - Birth Date: {$this->birthDate->format('Y-m-d')}
                 - Membership Expiration Date: {$this->membershipExpirationDate->format('Y-m-d')}
                 - Role: {$this->role}";
  }

  public function toArray(): array
  {
    return [
      'id' => $this->id,
      'firstName' => $this->firstName,
      'lastName' => $this->lastName,
      'email' => $this->email,
      'phoneNumber' => $this->phoneNumber,
      'address' => $this->address,
      'birthDate' => $this->birthDate->format('Y-m-d'),
      'membershipExpirationDate' => $this->membershipExpirationDate->format('Y-m-d'),
      'role' => $this->role
    ];
  }
}
