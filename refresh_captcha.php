<?php
error_reporting(0);
session_start();

// Generate new arithmetic captcha
$num1 = rand(10, 99);
$num2 = rand(1, 20);
$operations = ['+', '-', '*'];
$operation = $operations[array_rand($operations)];

switch($operation) {
    case '+':
        $_SESSION['captcha_answer'] = $num1 + $num2;
        $_SESSION['captcha_question'] = "$num1 + $num2 = ?";
        break;
    case '-':
        $_SESSION['captcha_answer'] = $num1 - $num2;
        $_SESSION['captcha_question'] = "$num1 - $num2 = ?";
        break;
    case '*':
        $_SESSION['captcha_answer'] = $num1 * $num2;
        $_SESSION['captcha_question'] = "$num1 × $num2 = ?";
        break;
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode([
    'success' => true,
    'question' => $_SESSION['captcha_question'],
    'answer' => $_SESSION['captcha_answer']
]);
?>
