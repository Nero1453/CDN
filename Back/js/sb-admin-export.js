// PDF format using jsPDF and jsPDF Autotable 

function exportData() {
    $('#team-all').tableExport({
        displayTableName: false,
        fileName: 'Tabla Equipos',
        ignoreColumn: [3],
        type: 'pdf',
        jspdf: {
            orientation: 'l',
            format: 'a3',
            margins: {
              left: 10,
              right: 10,
              top: 20,
              bottom: 20
            },
        autotable: {
        styles: {
            fillColor: 'inherit',
            textColor: 'inherit'
            },
        tableWidth: 'auto'
        }
        }
    });
}
// Excel Format

function exportDataExcelTeam() {
    $("table").tableExport({
        displayTableName: true,
        fileName: 'Tabla Equipos',
        ignoreColumn: [3],
    });
}

// To-do Page
// PDF format using jsPDF and jsPDF Autotable 

function exportDataTodo() {
    $('#todo-all').tableExport({
        displayTableName: false,
        fileName: 'Tabla Tareas',
        ignoreColumn: [1],
        type: 'pdf',
        jspdf: {
            orientation: 'l',
            format: 'a3',
            margins: {
              left: 10,
              right: 10,
              top: 20,
              bottom: 20
            },
        autotable: {
        styles: {
            fillColor: 'inherit',
            textColor: 'inherit'
            },
        tableWidth: 'auto'
        }
        }
    });
}
// Excel Format

function exportDataExcelTodo() {
    $("#todo-all").tableExport({
        displayTableName: true,
        fileName: 'Tabla Tareas',
        ignoreColumn: [1],
    });
}
