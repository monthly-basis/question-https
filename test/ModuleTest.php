<?php
namespace MonthlyBasis\QuestionHttpsTest;

use MonthlyBasis\QuestionHttps\Module;
use MonthlyBasis\LaminasTest\ModuleTestCase;

class ModuleTest extends ModuleTestCase
{
    protected function setUp(): void
    {
        $this->module = new Module();
    }
}
