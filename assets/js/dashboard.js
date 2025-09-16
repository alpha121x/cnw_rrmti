$(function () {
    $.fn.loadDataTable();
})

$.fn.loadDataTable = function() {

    // your JSON dataset
    const roadData = [
        {
            "id": "3984",
            "district": "Khanewal",
            "road_id_main": "258",
            "road_name": "Widening / Improvement of existing road from 10 ft to 12 ft and repair of road from Umar Hospital Khanewal Bypass to Thokar Chawan, Length=11.50KM, District Khanewal.",
            "stage": "Sub base",
            "test_of_type": "Compaction",
            "result": "Out Of Specified Limit",
            "comments": "Test is  Fail.",
            "picture": "assets\\img\\road-image.jpg"
        }
        // you can add more records here
    ];

    // initialize DataTable
    dtTable = $("#dtRecords").DataTable({
        data: roadData,   // load JSON directly
        responsive: true,
        sPaginationType: "full_numbers",
        scrollY: "300px",
        scrollX: true,
        scrollCollapse: true,
        fixedHeader: true,
        columns: [
            { data: 'id', title: 'ID', width: '50px' },
            { data: 'district', title: 'District', width: '100px' },
            { data: 'road_id_main', title: 'Road ID', width: '80px' },
            { data: 'road_name', title: 'Road Name', width: '450px' },
            { data: 'stage', title: 'Stage', width: '100px' },
            { data: 'test_of_type', title: 'Test Type', width: '120px' },
            { data: 'result', title: 'Result', width: '150px' },
            { data: 'comments', title: 'Comments', width: '200px' },
            {
                data: 'picture',
                title: 'Picture',
                render: function (data) {
                    return data
                        ? '<a href="' + data + '" target="_blank" data-lightbox="photos"><img src="' + data + '" alt="image" class="rounded img-thumbnail" width="100" height="100"/></a>'
                        : '';
                },
                width: '80px'
            }
        ]
    });
};