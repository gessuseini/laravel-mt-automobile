$('#reservation_date').change(function() {
    const selectedDate = $(this).val();
    $.get('/get-available-times', { date: selectedDate }, function(response) {
        const timeInputsContainer = $('#time-inputs-container');
        timeInputsContainer.empty();

        response.forEach(function(slot) {
            const input = document.createElement('input');
            input.type = 'radio';
            input.name = 'reservation_time';
            input.value = slot.time;
            input.id = slot.time;

            const label = document.createElement('label');
            label.setAttribute('for', slot.time);
            label.textContent = slot.time;

            timeInputsContainer.append(input);
            timeInputsContainer.append(label);
            timeInputsContainer.append(document.createElement('br'));
        });
    });
});
