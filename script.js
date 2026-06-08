function validateNoticeForm()
{
    let title = document.getElementById("title").value;
    let description = document.getElementById("description").value;

    if(title.trim() === "")
    {
        alert("Please enter notice title");
        return false;
    }

    if(description.trim() === "")
    {
        alert("Please enter notice description");
        return false;
    }

    return true;
}

function confirmDelete()
{
    return confirm("Are you sure you want to delete this notice?");
}