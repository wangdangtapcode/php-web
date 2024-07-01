// Search

const form_search = document.getElementById('form-search');
if( form_search){
    let url =new URL(window.location.href);
    form_search.addEventListener("submit", (e) => {
        
        e.preventDefault();
        const keyword = e.target.elements.keyword.value;

        if(keyword){
            url.searchParams.set("keyword",keyword);
        }else {
            url.searchParams.delete("keyword");
        }

        window.location.href= url.href;
    });

}


// End Search

// Pagination 
const buttonsPagination =document.querySelectorAll("[button-pagination]");
if(buttonsPagination){
    let url =new URL(window.location.href);

    buttonsPagination.forEach(button =>{
        button.addEventListener("click", () => {
            const page = button.getAttribute("button-pagination");
            
            url.searchParams.set("page",page);

            window.location.href= url.href;
        });
    });

}

// End Pagination

// Change-status
const buttonsChangeStatus = document.querySelectorAll("[button-change-status]");
if(buttonsChangeStatus.length > 0){

    const formChangeStatus = document.querySelector("#form-change-status");
    const path = formChangeStatus.getAttribute("data-path");

    buttonsChangeStatus.forEach(button => {
        button.addEventListener("click", () => {
            const statusCurrent = button.getAttribute("data-status");
            const id = button.getAttribute("data-id");

            let statusChange = statusCurrent=="active" ? "inactive" : "active";

            const action =path +`/${statusChange}/${id}`;
            formChangeStatus.action=action;
            
            formChangeStatus.submit();
        });
    });
}

//End Change-status

// DELETE

const buttonsDelete = document.querySelectorAll("[button-delete]");
if(buttonsDelete.length > 0){
    const formDeleteItem = document.querySelector("#form-delete-item");
    const path = formDeleteItem.getAttribute("data-path");
    buttonsDelete.forEach(button => {
        button.addEventListener("click", () =>{
            const isConfirm = confirm("Bạn có chắc muốn xóa sản phẩm này không?");

            if(isConfirm){
                const id = button.getAttribute("data-id");

                const action =path +`/${id}`;
                formDeleteItem.action=action;
                
                formDeleteItem.submit();
            }
        });
    });
}
// END DELETE

// DropdownLimit
const buttonSelect = document.querySelector(".form-select");
if(buttonSelect){
    const formChangeLimit = document.querySelector("#form-change-limit");
    const path = formChangeLimit.getAttribute("data-path");
    buttonSelect.addEventListener("change", (e)=>{
        const value =  e.target.value;
        const action =path +`/${value}`;
        formChangeLimit.action=action;
        formChangeLimit.submit();
    });
    
}
// End DROPDOWNLIMIT

// Detail Item
const buttonDetail = document.querySelectorAll("[button-detail]");
if(buttonDetail){
    const formDetail = document.querySelector("#form-detail");
    const path = formDetail.getAttribute("data-path");
    buttonDetail.forEach(button => {
        button.addEventListener("click", () => {
            const id = button.getAttribute("data-id");
            const action = path+  `/${id}`;
            formDetail.action=action;
            formDetail.submit();
        });
    });
}
// End DetailItem