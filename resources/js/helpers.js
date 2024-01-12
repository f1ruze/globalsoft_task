import Swal from 'sweetalert2';

export function getCsrfToken() {
    return document.querySelector("meta[name='csrf-token']").content;
}

export function deleteAuthor(e, recordName) {
    e.preventDefault();
    let confirmation = Swal.fire({
        title: `<strong>Delete ${recordName}</strong>`,
        icon: "info",
        text: 'Are you sure you want to delete?',
        showCloseButton: true,
        showCancelButton: true,
        focusConfirm: true,
        confirmButtonText: `Yes, delete it`,
        confirmButtonAriaLabel: "confirm",
        cancelButtonText: 'No, never mind',
        cancelButtonAriaLabel: "cancel"
    }).then(result => {
        if (result.isConfirmed) {
            e.target.submit();
        }
    });
}
