$(window).on('load', ()=>{
    toggleList($(".showList"))
    toggleList($(".backList"))
    toggleAddNewContent($(".addNew"))
    toggleAddNewContent($(".backaddNew"))
})

function toggleList(elem){
    $(elem).click(()=>{
        $(".list").toggleClass('hidden')
        $(".menu").toggleClass('hidden')
    })
}
function toggleAddNewContent(elem){
    $(elem).click(()=>{
        $(".addNewContent").toggleClass('hidden')
        $(".menu").toggleClass('hidden')
    })
}