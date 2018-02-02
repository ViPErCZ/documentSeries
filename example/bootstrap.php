<?php

require_once __DIR__ . '/../src/entity/Base.php';
require_once __DIR__ . '/../src/entity/Serie.php';
require_once __DIR__ . '/../src/entity/AccountingYear.php';
require_once __DIR__ . '/../src/models/IAccountingYearModel.php';
require_once __DIR__ . '/../src/models/ISeriesModel.php';
require_once __DIR__ . '/../src/models/IGenerate.php';
require_once __DIR__ . '/../src/models/drivers/IDriverList.php';
require_once __DIR__ . '/../src/models/drivers/DefaultGenerateTrait.php';
require_once __DIR__ . '/../src/models/drivers/UnitTest/AccountingYearModel.php';
require_once __DIR__ . '/../src/models/drivers/UnitTest/SeriesModel.php';
require_once __DIR__ . '/../src/exceptions/DriverException.php';
require_once __DIR__ . '/../src/models/drivers/DriversList.php';
require_once __DIR__ . '/../src/models/IDriverBuilder.php';
require_once __DIR__ . '/../src/models/DriverBuilder.php';
require_once __DIR__ . '/../src/SeriesOperator.php';