gsap.registerPlugin(Draggable);

const getDateFormat = (date) => {
    date.setFullYear(date.getFullYear() - 12);
    return date.getFullYear() + '-' + (date.getMonth() + 1).toString().padStart(2, "0") + '-' + date.getDate().toString().padStart(2, "0");
};

const daysInYear = (year) => {
    return (year % 4 === 0 && year % 100 > 0) || year % 400 == 0 ? 366 : 365;
};

document.querySelectorAll(".useful-datepicker").forEach((datepicker) => {
    const input = $('[name="birthday"]');
    input.on('input', function () {
        updateSystem();
    })

    const today = new Date();

    input.val(getDateFormat(today));

    function updateDate() {
        gsap.set(datepicker.querySelector(".earth"), {
            rotate: `${this.rotation * 3}deg`,
        });
        const percent = (this.rotation / 360) * 100 *-1;
        const days = (percent / 100) * daysInYear(today.getFullYear());
        const newDate = new Date();
        newDate.setDate(today.getDate() + days);
        input.val(getDateFormat(newDate));
    }

    Draggable.create(datepicker.querySelector(".rotate"), {
        type: "rotation",
        inertia: true,
        throwResistance: 0.5,
        onDrag: updateDate,
        onThrowUpdate: updateDate,
    });
});
