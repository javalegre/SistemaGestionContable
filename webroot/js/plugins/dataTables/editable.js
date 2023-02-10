/* Esta funcion es la que permite la edicion del DataTable */
(function (factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD
        define(['jquery', 'datatables.net'], function ($) {
            return factory($, window, document);
        });
    }
    else if (typeof exports === 'object') {
        // CommonJS
        module.exports = function (root, $) {
            if (!root) {
                root = window;
            }

            if (!$ || !$.fn.dataTable) {
                $ = require('datatables.net')(root, $).$;
            }

            return factory($, root, root.document);
        };
    }
    else {
        // Browser
        factory(jQuery, window, document);
    }
}(function ($, window, document, undefined) {
    'use strict';
    var DataTable = $.fn.dataTable;

    var _instance = 0;

    var altEditorTable = function (table, settings) {

        this.settings = settings;
        this.data = {
            /** @type {DataTable.Api} DataTables' API instance */
            table: new DataTable.Api(table),
            /** @type {String} Unique namespace for events attached to the document */
            namespace: '.altEditorTable' + (_instance++),
            instance: _instance
        };

        this.dom = {
            /** @type {jQuery} altEditor handle */
            modal: $('<div class="dt-altEditorTable-handle"/>')
        };

        /* Constructor logic */
        this._constructor();

    };

    $.extend(altEditorTable.prototype, {
        _constructor: function () {

            var isEditing = null;
            var actionOriginal = null;
            var that = this;
            var dt = this.data.table;
            var acc = dt; // (jqTds[that.settings.columnAction]).html();
            this._setup();

            dt.on('destroy.altEditorTable', function () {
                dt.off('.altEditorTable');
                $(dt.table().body()).off(that.data.namespace);
                $(document.body).off(that.data.namespace);
                $(dt.body()).off("click", "td");
            });
        },
        _setup: function () {
            
            var that = this;
            // Add nueva linea 
            $('.' + this.settings.createCssEvent).click(function (e) {
                e.preventDefault();
                if (that.isEditing !== null && that.isEditing !== nRow && (typeof that.isEditing !== 'undefined')) {
                    that._restoreRow(that.isEditing);
                    that.isEditing = null;
                }
                $(this).attr("disabled", true);
                var objectRow = new Object();
                if (typeof that.settings.temporalId !== 'undefined') {
                    objectRow[that.settings.temporalId] = Math.round(Math.random() * (500 - 0) + parseInt(0));
                }
                var newRow = that.data.table.row.add(objectRow).draw(false);
                var nRow = that.data.table.row(newRow).node();
                that._editRow(nRow);
                that.isEditing = nRow;
                that.data.table.page('last').draw(false);
               // disabledFields
                if (that.settings.disabledFields !== 'undefined') {
                    var jqTds = $('>td', nRow);
                    that._disabledFields( jqTds, that.settings.disabledFields );
                }
            });

            //Delete Row
            this.data.table.on("click", 'a.delete', function (e) {
                e.preventDefault();

                var tr = $(this).closest('tr');
                var row = that.data.table.row(tr);
                var aData = that.data.table.row(row).data();
                var jqTds = $('>td', row);
                that.actionOriginal = $(jqTds[that.settings.columnAction]).html();
                $(jqTds[that.settings.columnAction]).html('<i class="fa fa-spin fa-refresh text-success"></i>');
                that.settings.onUpdate(that.data.table, aData, true, this.actionOriginal, $(jqTds[that.settings.columnAction]));
                that.data.table.row(tr).remove().draw();
                this.actionOriginal = null;
                
                /* Averiguo si habilito o no el boton de Ejecutar OT */
                var nFilas = $(".contractors-table tr").length;
                var nColumnas = $(".contractors-table tr:last td").length;
                if (nFilas > 2 || nColumnas > 1) {
                    $('.EjecutarOT').attr("disabled", false);
                } else {
                    $('.EjecutarOT').attr("disabled", true);
                }
                
            });

            //Cancel Editing or Adding a Row
            this.data.table.on("click", 'a.cancel', function (e) {
                e.preventDefault();
                that._restoreRow(that.isEditing);
                that.isEditing = null;
                $('.' + that.settings.createCssEvent).attr("disabled", false);
            });

            //Edit A Row
            this.data.table.on("click", 'a.edit', function (e) {
                e.preventDefault();

                var tr = $(this).closest('tr');
                var row = that.data.table.row(tr);

                if (that.isEditing !== null && that.isEditing != tr && (typeof that.isEditing !== 'undefined')) {
                    that._restoreRow(that.isEditing);
                    that._editRow(tr);
                    that.isEditing = tr;
                } else {
                    that._editRow(tr);
                    that.isEditing = tr;
                }
            });

            //Save an Editing Row
            this.data.table.on("click", 'a.save', function (e) {
                e.preventDefault();
                if (!that._saveRow(that.isEditing)) {
                    that.isEditing = null;
                }
                //Some Code to Highlight Updated Row
                
            });
        },
        _restoreRow: function (nRow) {
            var aData = this.data.table.row(nRow).data();
            var jqTds = $('>td', nRow);
            var that = this;
            if (typeof aData.id !== 'undefined') {
                var columnsDatatables = this.data.table.settings().init().columns;
                var columnIndex = 0;
                $.each(columnsDatatables, function (index, column) {
                    if ((typeof column.visible === 'undefined') || !column.visible === false) {
                        if ((typeof column.className === 'undefined') || column.className.indexOf('no-edit') === -1) {

                            var cell = that.data.table.row(nRow).cell(jqTds[columnIndex]);
                            try {
                                var fields = column.data.split('.');
                                if (typeof fields[1] === 'undefined') {
                                    if (typeof aData[column.data] === 'undefined') {
                                        cell.data(null);
                                    } else {
                                        cell.data(aData[column.data]);
                                    }
                                } else {
                                    if (typeof aData[fields[0]] !== 'undefined'){
                                        cell.data(aData[fields[0]][fields[1]]);
                                    } else {
                                        cell.data(null);
                                    }
                                }
                            } catch (e) {
                                cell.data(aData[column.data]);
                            }
                        }
                        columnIndex++;
                    }

                });

                $(jqTds[this.settings.columnAction]).html(this.actionOriginal);
                $(jqTds[this.settings.columnAction]).find('.tooltip').remove();
                this.actionOriginal = null;
                this.data.table.draw();
            } else {
                that.data.table.row(nRow).remove().draw();
            }
            
            /* Averiguo si habilito o no el boton de Ejecutar OT */
            var nFilas = $(".contractors-table tr").length;
            var nColumnas = $(".contractors-table tr:last td").length;
            if (nFilas > 2 || nColumnas > 1) {
                $('.EjecutarOT').attr("disabled", false);
            } else {
                $('.EjecutarOT').attr("disabled", true);
            }
        },
        // Edit Row
        _editRow: function (nRow) {
            var that = this;
            var jqTds = $('>td', nRow);
            var columnsDatatables = this.data.table.settings().init().columns;
            var columnIndex = 0;
            var first = true;
            if (typeof this.settings.onEdit !== 'undefined') {
                this.settings.onEdit(this.data.table, this.data.table.row(nRow).data());
            }
            
            /* Al editar una linea, deshabilito el Generar OT */
            $('.EjecutarOT').attr("disabled", true);
            
            $.each(columnsDatatables, function (index, column) {
                if ((typeof column.visible === 'undefined') || !column.visible === false) {
                    if ((typeof column.className === 'undefined') || column.className.indexOf('no-edit') === -1) {
                        var cell = that.data.table.row(nRow).cell(jqTds[columnIndex]);
                        // Show input
                        var input = that._getInputHtml(columnIndex, that.settings, cell.data(), column, jqTds, that.data.instance);
                        $(jqTds[columnIndex]).html(input.html);
                        if (first) {
                            first = false;
                        }
                    }
                    columnIndex++;
                }
            });

            if (that.settings.inputTypes) {
                $.each(that.settings.inputTypes, function (index, setting) {
                    if (typeof setting.disabledFields !== 'undefined') {
                        $("#select-" + that._getSelectorName(columnsDatatables[index].data) + that.data.instance).trigger("change");
                    }
                });
            }
            that.actionOriginal = $(jqTds[that.settings.columnAction]).html();
            $(jqTds[that.settings.columnAction]).html('<div class="btn-group"><a href="#" class="btn btn-success btn-xs save"><i class="fa fa-save"></i></a> <a href="#" class="btn btn-warning btn-xs cancel"><i class="fa fa-times"></i></a></div>');
            this.data.table.draw();
            try {
                $('.datepicker').datepicker({
                    language: 'es',
                    format: 'dd/mm/yyyy',
                    autoclose: true
                });

                /* Meto el filtro especifico para insumos */
                $(".select-inline-productos").select2({
                    theme: "inline",
                    placeholder: "Seleccione el insumo ...",
                    minimumInputLength: 3,
                    ajax: {
                        url: "/productos/search",
                        dataType: 'json',
                        processResults: function (data, params) {
                            return { results: data.productos };
                        }
                    }
                });                
                
                $(".select-inline").select2({
                    theme: "inline"
                });
                $(".select-inline-vacio").select2({
                    theme: "inline",
                    allowClear: true,
                    placeholder: {
                        value: "0",
                        text:"Sin Lote",
                        selected:'selected'
                      }
                });
            } catch(e) {}
        },
        // Save Row
        _saveRow: function (nRow) {

            var that = this;
            var jqTds = $('>td', nRow);
            var l_error = false;
            var l_globalError = false;

            var columnsDatatables = this.data.table.settings().init().columns;
            var columnIndex = 0;
            $.each(columnsDatatables, function (index, column) {
                if ((typeof column.visible === 'undefined') || !column.visible === false) {
                    if ((typeof column.className === 'undefined') || column.className.indexOf('no-edit') === -1) {

                        var cell = that.data.table.row(nRow).cell(jqTds[columnIndex]);
                        var inputField = that._getInputField(jqTds[columnIndex]);
                        l_error = false;

                        if (that.settings.errorClass) {
                            $(inputField).removeClass(that.settings.errorClass);
                        } else {
                            $(inputField).removeClass('edit-input-error');
                        }
                        var l_parent = $(inputField).parent();
                        $(l_parent).find(".error-message").remove();

                        if (((that.settings.validations) && that.settings.validations !== true)) {
                            $.each(that.settings.validations, function (index, setting) {
                                if (setting.column === columnIndex) {
                                    if (_.has(setting, 'allowNull') && !setting.allowNull) {
                                        if (inputField.val() === '' || inputField.val() === "0" ) {
                                            that._validationError(inputField, setting.message);
                                            l_error = true;
                                        }
                                    }
                                    if (_.has(setting, 'method') && setting.method !== '' && !l_error && inputField.val() !== '') {
                                        if (!setting.method(inputField.val())) {
                                            that._validationError(inputField, setting.message);
                                            l_error = true;
                                        }
                                    }
                                    return true;
                                }
                            });

                            if (!l_error) {
                                if (inputField.prop('type') === 'checkbox') {
                                    if (inputField[0].checked) {
                                        cell.data(true);
                                    } else {
                                        cell.data(false);
                                    }
                                } else if (inputField.prop('type') === 'date') {
                                    var l_date = inputField.datepicker('getDate');
                                    cell.data({display: inputField.val(), timestamp: l_date.getTime()});
                                } else {
                                    cell.data(inputField.val());
                                }
                            } else {
                                l_globalError = l_error;
                            }
                        } else {
                            //_update(newValue);
                            if (inputField.prop('type') === 'checkbox') {
                                if (inputField[0].checked) {
                                    cell.data(true);
                                } else {
                                    cell.data(false);
                                }
                            } else {
                                cell.data(inputField.val());
                            }
                        }
                    }
                    columnIndex++;
                }
            });

            if (!l_globalError) {
                var cell = this.data.table.row(nRow).cell(jqTds[this.settings.columnAction]);
                $(jqTds[this.settings.columnAction]).html(this.actionOriginal);
                $(jqTds[this.settings.columnAction]).html('<i class="fa fa-spin fa-refresh text-success"></i>');
                var aData = this.data.table.row(nRow).data();
                this.settings.onUpdate(this.data.table, aData, false, this.actionOriginal, $(jqTds[this.settings.columnAction]), this.settings.temporalId);
                this.actionOriginal = null;
            }
            this.data.table.draw();
            
            /* Deshabilito el boton que creo la linea */
            $('.' + this.settings.createCssEvent).attr("disabled", false);
            
            return l_globalError;

        },
        _validationError: function (inputField, message) {

            if (this.settings.errorClass) {
                $(inputField).addClass(this.settings.errorClass);
            } else {
                $(inputField).addClass('edit-input-error');
            }
            $("<div class='animated fadeInDown text-danger dfn remove-margin-b error-message'>" + message + "</div>").insertAfter(inputField);

        },
        _getInputHtml: function (currentColumnIndex, settings, oldValue, column, jqTds, instance) {
            var inputSetting, inputType, input, inputCss, confirmCss, cancelCss, ColumnCss;
            input = {"focus": true, "html": null};
            
            if (settings.inputTypes) {
                $.each(settings.inputTypes, function (index, setting) {
                    if (setting.column == currentColumnIndex) {
                        inputSetting = setting;
                        inputType = inputSetting.type.toLowerCase();
                        ColumnCss = inputSetting.class;
                    }
                });
            }
            if (settings.inputCss) {
                inputCss = settings.inputCss;
                if (ColumnCss !== 'undefined') {
                    inputCss = inputCss + ' ' + ColumnCss;
                }
            }
            if (settings.confirmationButton) {
                confirmCss = settings.confirmationButton.confirmCss;
                cancelCss = settings.confirmationButton.cancelCss;
                inputType = inputType + "-confirm";
            }
            switch (inputType) {
                case "list":
                    input.html = "<select class=' " + inputCss + " select-" + column.data + instance + "' id='select-" + column.data + instance + "' value='" + oldValue + "'>";
                    if (oldValue == 'null') {
                        oldValue = null;
                    }
                    $.each(inputSetting.options, function (index, option) {
                        /* No hay ningun filtro */
                        input.html = input.html + "<option value='" + option.value + "'";
                        if (option.value == 'null') {
                            option.value = null;
                        }
                        /* Si encuentro el lote, lo filtro */
                        if(inputSetting.lote !== 'undefined'){
                            if(inputSetting.lote == option.value){
                                input.html = input.html + " selected ";
                            }
                        }
                        if (oldValue == option.display) {
                            input.html = input.html + " selected ";
                        }
                        input.html = input.html + ">" + option.display + "</option>";
                    });
                    input.html = input.html + "</select>";
                    input.focus = false;
                    /*********************************************************************************
                     *  EVENTOS 
                     * Capturo los eventos de cada objeto, para eso, defino en la columna un callBack,
                     * de esa manera puedo capturar un evento del obtejo.
                     *
                     ********************************************************************************/
                    if (typeof inputSetting.callBack !== 'undefined'){
                        $(document).on('change', '#select-' + this._getSelectorName(column.data) + instance, {
                            domTD: jqTds, settings: inputSetting, columna: currentColumnIndex
                        }, function (events) {
                            events.data.settings.callBack(this.value, events );
                        });                        
                    }
                    break;
                case "number": // text input w/ confirm
                    if(oldValue == '' && inputSetting.hectareas !== 'undefined'){
                        /* Si la columna esta vacia, y esta configurada las hectareas */
                        if (currentColumnIndex == 5){
                            for(var i=0;i<lotes.length;i++){
                                if(lotes[i].id == $('#lote').val()){
                                    oldValue = lotes[i]['has'];
                                }
                            }
                        }
                        /* No hay dosis establecida */
                        if (currentColumnIndex == 6){
                            oldValue = 1;
                        }
                        /* No hay total, repito el tamaño del lote */
                        if (currentColumnIndex == 7 && oldValue == '' ){
                            for(var i=0;i<lotes.length;i++){
                                if(lotes[i].id == $('#lote').val()){
                                    oldValue = lotes[i]['has'];
                                }
                            }
                        }
                    }
                    input.html = "<input autofocus type='text' class='" + inputCss + " text-right " + column.data + instance + "' id='input-" + column.data + instance + "' value='" + oldValue + "'></input>";
                    /* Capturo los eventos de los inputs */
                    if (typeof inputSetting.callBack !== 'undefined'){
                        $(document).on('keyup', '#input-' + this._getSelectorName(column.data) + instance, {
                            domTD: jqTds, settings: inputSetting, columna: currentColumnIndex
                        }, function (events) {
                            events.data.settings.callBack(this.value, events );
                        });
                    };
                    
                    break;
                case "checkbox": // text input w/ confirm
                    var l_check = '';
                    if (oldValue) {
                        l_check = 'checked';
                    }
                    input.html = "<input id='check" + instance + "_" + currentColumnIndex + "' type='checkbox' class='" + inputCss + "' " + l_check + "></input> <label for='check" + instance + "_" + currentColumnIndex + "'></label>";
                    break;
                case "text-confirm": // text input w/ confirm
                    //input.html = "<input id='ejbeatycelledit' class='" + inputCss + "' value='"+oldValue+"'></input>&nbsp;<a href='#' class='" + confirmCss + "' onclick='$(this).updateEditableCell(this)'>Confirm</a> <a href='#' class='" + cancelCss + "' onclick='$(this).cancelEditableCell(this)'>Cancel</a> ";
                    input.html = "<input autofocus class='" + inputCss + " " + column.data + instance + "' value='" + oldValue + "'></input>";
                    break;
                case "undefined-confirm": // text input w/ confirm
                    //input.html = "<input id='ejbeatycelledit' class='" + inputCss + "' value='" + oldValue + "'></input>&nbsp;<a href='#' class='" + confirmCss + "' onclick='$(this).updateEditableCell(this)'>Confirm</a> <a href='#' class='" + cancelCss + "' onclick='$(this).cancelEditableCell(this)'>Cancel</a> ";
                    input.html = "<input autofocus class='" + inputCss + "' value='" + oldValue + "'></input>";
                    break;
                case "date":
                    var data;
                    if (typeof column.data == 'object') {
                        data = column.data._;
                    } else {
                        data = column.data;
                    }
                    input.html = "<input type='text' id='" + data + instance + "'  name='" + data + instance + "'  required='required' class='" + inputCss + " form-control input-inline datepicker form-control valid' data-provide='datepicker' data-date-format='dd/mm/yyyy'  data-date-language='es' value='" + oldValue + "' aria-required='true' aria-invalid='false' >";
                    break;
                default: // text input
                    input.html = "<input autofocus class='" + inputCss + " " + column.data + instance + "' value='" + oldValue + "'></input>";
                    break;
            }
            return input;
        },
        _getInputField: function (callingElement) {
            // Update datatables cell value
            var inputField;
            switch ($(callingElement).prop('nodeName').toLowerCase()) {
                case 'td': // This means they're using confirmation buttons
                    if ($(callingElement).find('input').length > 0) {
                        inputField = $(callingElement).find('input');
                    }
                    if ($(callingElement).find('select').length > 0) {
                        inputField = $(callingElement).find('select');
                    }
                    if (typeof inputField == 'undefined') {
                        inputField = $(callingElement).find('input');
                    }
                    break;
                default:
                    inputField = $(callingElement).find('input');
            }
            return inputField;
        },
        _getSelectorName: function (name) {
            var fields = name.split('.');
            if (typeof fields[1] == 'undefined') {
                return name;
            } else {
                return fields[0] + '\\.' + fields[1];
            }
        },
        _disabledFields: function ( domTD, elementos ) {
            $.each(domTD, function (index, td) {
                var inputField;
                if ($(td).find('input').length > 0) {
                    inputField = $(td).find('input');
                }
                if ($(td).find('select').length > 0) {
                    inputField = $(td).find('select');
                }
                try {
                    if (typeof elementos[index] !== 'undefined') {
                        $(inputField).prop('disabled', true);
                        $(inputField).val(null);
                    }
                } catch (e) {
                    $(inputField).prop('disabled', false);
                }
            });            
        }
    });

    // Alias for access
    DataTable.altEditorTable = altEditorTable;

    return altEditorTable;
}));