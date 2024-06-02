
let count = 1;
let aside_arrows =document.getElementsByClassName('aside-arrow');
for(let i=0;i<aside_arrows.length;i++){
    console.log(aside_arrows[i])
    aside_arrows[i].addEventListener('click',()=>{
        aside_arrows[i].classList.toggle('rotate')
        aside_arrows[i].parentNode.parentNode.parentNode.children[1].classList.toggle('dropmenu-items-hidden')
    });
}


let menu_icon = document.getElementById('menu-icon');
let aside = document.getElementById('lims_slider');
menu_icon.addEventListener('click',()=>{
    aside.classList.toggle('aside-remove');
});

window.addRowParams =()=>{

    let tboady = document.getElementById('paramBody');
    let tableRow = document.createElement("tr");

    tableRow.innerHTML +=`
    <td>
        <div class="input-item">
            <label  class="form-label require">Name</label>
            <input type="text" name="parameters[${count}][name]" class="form-control">
        </div>
    </td>
    <td>
        <div class="input-item">
            <label  class="form-label require">referance range</label>
            <input type="text"  name="parameters[${count}][referance_range]" class="form-control">
        </div>
    </td>
    <td>
        <div class="input-item">
            <label   class="form-label require">data type</label>
            <select name="parameters[${count++}][data_type]" class="form-control">
                <option value="text">text</option>
            </select>
        </div>
    </td>
    <td>
        <div onclick="deleteRowParams(this)" class="d-flex mt-3 align-items-center justify-content-center">
            <i class="fa fa-close fs-5 text-danger text-center"></i>
        </div>
    </td>`;
    tboady.append(tableRow);

}
window.deleteRowParams =(e)=>{
    let tboady = document.getElementById('paramBody');
    tboady.removeChild(e.parentNode.parentNode);
}


window.diplayAddRevenuePatient =(e)=>{
     let patientsList = document.getElementById('patietns-add-revenue');
     let otherInput   = document.getElementById('other-revenue-add');
    if(e.value == 'patient'){
       patientsList.style.display ='block';
       otherInput.classList.add('d-none');
    }else{
        patientsList.style.display ='none';
        otherInput.classList.remove('d-none');
    }

}

window.openAlert = (formID)=>{
    let alert = document.getElementById('alert');
    let button = document.getElementById('alertActionButton');
    alert.classList.remove('d-none');
    alert.classList.add('d-flex');
    button.removeAttribute('onclick');
    button.setAttribute('onclick',`submitFormById('${formID}')`);
}
window.closeAlert =()=>
{
    let alert = document.getElementById('alert');
    alert.classList.add('d-none');
    alert.classList.remove('d-flex');
}
window.submitFormById =(id)=>{
    closeAlert();
    let form = document.getElementById(id);
    form.submit();

}
