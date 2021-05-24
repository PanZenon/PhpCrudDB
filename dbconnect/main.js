$(window).on('load', ()=>{
    toggleList($(".showList"))
    toggleList($(".backList"))
    toggleAddNewContent($(".addNew"))
    toggleAddNewContent($(".backaddNew"))
    toggleListPositions($(".showPositions"))
    toggleListPositions($(".backListPositions"))
})

function toggleList(elem){
    $(elem).click(()=>{
        $(".listUsers").toggleClass('hidden')
        $(".menu").toggleClass('hidden')
    })
}
function toggleListPositions(elem){
    $(elem).click(()=>{
        $(".listPositions").toggleClass('hidden')
        $(".menu").toggleClass('hidden')
    })
}
function toggleAddNewContent(elem){
    $(elem).click(()=>{
        $(".addNewContent").toggleClass('hidden')
        $(".menu").toggleClass('hidden')
    })
}
