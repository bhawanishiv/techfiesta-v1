



document = new function () {
    this.createPdf = function () {
        // open the PDF in a new window
        var docDefinition = {content: 'This is an sample PDF printed with pdfMake'};
        pdfMake.createPdf(docDefinition).open();
        alert('dsfsd');
    };
//    this.docDefinition = {
//// a string or { width: number, height: number }
//        pageSize: 'A4',
//        // by default we use portrait, you can change it to landscape if you wish
////        pageOrientation: 'landscape',
//        // [left, top, right, bottom] or [horizontal, vertical] or just a number for equal margins
//        pageMargins: [40, 60, 40, 60],
//
//        content: [
//            {
//                // if you specify width, image will scale proportionally
////                image: 'data:image/jpeg;base64,...encodedContent...',
////                width: 150,
//
//                table: {
//                    // headers are automatically repeated if the table spans over multiple pages
//                    // you can declare how many rows should be treated as headers
//                    headerRows: 1,
//                    widths: ['*', 'auto', 100, '*'],
//
//                    body: [
//                        ['First', 'Second', 'Third', 'The last one'],
//                        ['Value 1', 'Value 2', 'Value 3', 'Value 4'],
//                        [{text: 'Bold value', bold: true}, 'Val 2', 'Val 3', 'Val 4']
//                    ]
//                }
//            }
//        ],
//    };
};