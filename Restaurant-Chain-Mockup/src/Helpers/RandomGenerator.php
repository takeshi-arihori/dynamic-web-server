<?php

namespace Helpers;

use Faker\Factory;
use Models\User\User;
use Models\User\Employee;
use Models\Companies\Company;
use Models\Companies\RestaurantChain;
use Models\Locations\RestaurantLocation;
use DateTime;

class RandomGenerator
{
  public static function user(): User
  {
    $faker = Factory::create();

    return new User(
      $faker->randomNumber(),
      $faker->firstName(),
      $faker->lastName(),
      $faker->email,
      'password',
      $faker->phoneNumber,
      $faker->address,
      new DateTime($faker->date),
      new DateTime($faker->date),
      $faker->randomElement(['admin', 'user', 'editor'])
    );
  }

  public static function employee(): Employee
  {
    $faker = Factory::create();

    return new Employee(
      $faker->randomNumber(),
      $faker->firstName(),
      $faker->lastName(),
      $faker->email,
      'password',
      $faker->phoneNumber,
      $faker->address,
      new DateTime($faker->date),
      new DateTime($faker->date),
      $faker->jobTitle,
      $faker->jobTitle,
      $faker->randomFloat(2, 30000, 100000),
      new DateTime($faker->date),
      [$faker->word, $faker->word, $faker->word]
    );
  }

  public static function company(): Company
  {
    $faker = Factory::create();

    return new Company(
      $faker->company,
      $faker->year,
      $faker->text,
      $faker->url,
      $faker->phoneNumber,
      $faker->companySuffix,
      $faker->name,
      $faker->boolean,
      $faker->country,
      $faker->name,
      $faker->numberBetween(10, 1000)
    );
  }

  public static function restaurantLocation(): RestaurantLocation
  {
    $faker = Factory::create();

    return new RestaurantLocation(
      $faker->company,
      $faker->address,
      $faker->city,
      $faker->state,
      $faker->postcode,
      self::employees(2, 5), // 従業員の数を制限
      $faker->boolean,
      $faker->boolean
    );
  }

  public static function restaurantChain(): RestaurantChain
  {
    $faker = Factory::create();

    return new RestaurantChain(
      $faker->randomNumber(),
      self::restaurantLocations(1, 3), // 場所の数を制限
      $faker->randomElement(['Italian', 'Chinese', 'American', 'Japanese']),
      $faker->numberBetween(1, 3),
      $faker->company,
      $faker->company,
      $faker->year,
      $faker->text,
      $faker->url,
      $faker->phoneNumber,
      $faker->companySuffix,
      $faker->name,
      $faker->boolean,
      $faker->country,
      $faker->name,
      $faker->numberBetween(10, 1000)
    );
  }

  public static function users(int $min, int $max): array
  {
    $faker = Factory::create();
    $users = [];
    $numOfUsers = $faker->numberBetween($min, $max);

    for ($i = 0; $i < $numOfUsers; $i++) {
      $users[] = self::user();
    }

    return $users;
  }

  public static function employees(int $min, int $max): array
  {
    $faker = Factory::create();
    $employees = [];
    $numOfEmployees = $faker->numberBetween($min, $max);

    for ($i = 0; $i < $numOfEmployees; $i++) {
      $employees[] = self::employee();
    }

    return $employees;
  }

  public static function restaurantLocations(int $min, int $max): array
  {
    $faker = Factory::create();
    $locations = [];
    $numOfLocations = $faker->numberBetween($min, $max);

    for ($i = 0; $i < $numOfLocations; $i++) {
      $locations[] = self::restaurantLocation();
    }

    return $locations;
  }
}
