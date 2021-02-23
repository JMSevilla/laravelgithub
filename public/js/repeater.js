jQuery.fn.extend({
    createRepeater: function () {
        var addItem = function (items, key, itemPrice) {
            var itemContent = items;
            var group = itemContent.data("group");
            var item = itemContent;
            var input = item.find('input,select');
            input.each(function (index, el) {
                var attrName = $(el).data('name');
                var skipName = $(el).data('skip-name');
                if (skipName != true) {
                    $(el).attr("name", group + "[" + key + "]" + attrName);
                    if(itemPrice != null){
                      var attrNamePrice = attrName.replace('[', '').replace(']', '');
                      $(el).attr("value", itemPrice[attrNamePrice]);
                    }
                  
                } else {
                    if (attrName != 'undefined') {
                        $(el).attr("name", attrName);
                    }
                }
            })
            var itemClone = items;
            $("<div class='items'>" + itemClone.html() + "<div/>").appendTo(repeater);
        };
        /* find elements */
        var repeater = this;
        var sizes_list = $(this).parent().find($(".list-sizes-content")).attr('data-values') != '' ? JSON.parse($(this).parent().find($(".list-sizes-content")).attr('data-values')) : [];
        var items = repeater.find(".items");
        var newItem = items;
        var key = 0;
        var addButton = repeater.find('.repeater-add-btn');
        
        if(sizes_list.length<=0){
          items.remove();
          addItem(newItem, key, null);
        } else{
          items.remove();
          for(var i=0; i<sizes_list.length; i++){
            addItem(newItem, key, sizes_list[i]);
            key++;
          }
        }
      
        /* handle click and add items */
        addButton.on("click", function () {
            addItem(newItem, key, null);
            key++;
        });
    }
});