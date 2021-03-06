<?php

?>
<!DOCTYPE html>
<html>

<head>
    <title>Tile Calculator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="stylesheet.css" rel="stylesheet" type="text/css">
</head>


<body>
    <div class="container">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Calculate Tiles Quantity</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-sm-12" style="display: inline-block;">
                            <div class="radio">
                                <label><input type="radio" name="measure_units" value="metres" checked="checked" />
                                    Metres</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="measure_units" value="feet_inches" />
                                    Feet & Inches</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="measure_units" value="inches" />
                                    Inches</label>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <p>Total Area : <strong id="totalArea"></strong></p>
                            <p>Total Cost : <strong id="totalCost"></strong></p>
                            <p>Total Tiles : <strong id="totalTiles"></strong></p>
                        </div>
                    </div>
                    <div class="row clearfix" id="tileCalc">
                        <div class="measure col-md-12 table-responsive" id="measure-metres">
                            <table class="table table-bordered table-hover table-sortable" id="tab_metres">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                        </th>
                                        <th class="text-center">
                                            Width
                                        </th>
                                        <th class="text-center">
                                            Length
                                        </th>
                                        <th class="text-center">
                                            Area
                                        </th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id='addr0' data-id="0" class="hidden">
                                        <td data-name="label">
                                            <label name='label0'></label>
                                        </td>
                                        <td data-name="width">
                                            <input type="number" min="0" name='width0' placeholder='Metres' class="width form-control" />
                                        </td>
                                        <td data-name="length">
                                            <input type="number" min="0" name='length0' placeholder='Metres' class="length form-control" />
                                        </td>

                                        <td data-name="area">
                                            <input type="number" min="0" disabled="true" name='area0' class="area form-control" />
                                        </td>

                                        <td data-name="del">
                                            <button name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a id="add_row" class="btn btn-primary float-right">Add Row</a>
                        </div>

                        <div class="measure col-md-12 table-responsive" id="measure-feet_inches">
                            <table class="table table-bordered table-hover table-sortable" id="tab_feet_inches">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                        </th>
                                        <th class="text-center" colspan="2">
                                            Width
                                        </th>
                                        <th class="text-center" colspan="2">
                                            Length
                                        </th>
                                        <th class="text-center">
                                            Area
                                        </th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id='addr0' data-id="0" class="hidden">
                                        <td data-name="label">
                                            Wall
                                        </td>
                                        <td data-name="feetwid">
                                            <input type="number" min="0" name='width0' placeholder='Feet' class="width form-control" />
                                        </td>
                                        <td data-name="inchwidth">
                                            <input type="number" min="0" name='winch0' placeholder='Inch' class="width form-control" />
                                        </td>
                                        <td data-name="feetleng">
                                            <input type="number" min="0" name='length0' placeholder='Feet' class="length form-control" />
                                        </td>
                                        <td data-name="inchlength">
                                            <input type="number" min="0" name='linch0' placeholder='Inch' class="length form-control" />
                                        </td>

                                        <td data-name="area">
                                            <input type="number" min="0" disabled="true" name='area0' class="area form-control" />
                                        </td>

                                        <td data-name="del">
                                            <button name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a id="add_feet_inch" class="btn btn-primary float-right">Add Row</a>
                        </div>

                        <div class="measure col-md-12 table-responsive" id="measure-inches">
                            <table class="table table-bordered table-hover" id="tab_inches">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                        </th>
                                        <th class="text-center">
                                            Width
                                        </th>
                                        <th class="text-center">
                                            Length
                                        </th>
                                        <th class="text-center">
                                            Area
                                        </th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id='addr0' data-id="0" class="hidden">
                                        <td data-name="label">
                                            Wall
                                        </td>
                                        <td data-name="widinch">
                                            <input type="number" min="0" name='winch0' placeholder='Inch' class="width form-control" />
                                        </td>
                                        <td data-name="leninch">
                                            <input type="number" min="0" name='linch0' placeholder='Inch' class="length form-control" />
                                        </td>

                                        <td data-name="area">
                                            <input type="number" min="0" disabled="true" name='area0' class="area form-control" />
                                        </td>

                                        <td data-name="del">
                                            <button name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a id="add_inch_row" class="btn btn-primary float-right"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="app.js"></script>
</body>

</html>