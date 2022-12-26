$(document).ready(function () {
    let color = ''
    $('input[name=color]').click(function () {
        if(color === $(this).val()) {
            color = ''
            $(this).parent().css("border-color","rgba(255, 255, 255, 0)")
            $('#product-color').text('')
        } else {
            color = $(this).val()
            $('input[name=color]').each(function () {
                $(this).parent().css("border-color","rgba(255, 255, 255, 0)")
            });
            $(this).parent().css("border-color","black")
            $('#product-color').text('- ' + $(this).data('color-name'))
            $('#product-color-qty').text($(this).data('color-qty') + ' sản phẩm')
        }
    })

    $('#add-to-cart').click(function () {
        if (color.length === 0) {
            alert('Bạn chưa chọn màu sản phẩm');
        } else {
            $.ajax({
                type: "GET",
                url: "cart/add",
                data: {
                    productId: $(this).data('product-id'),
                    color: $('input[name=color]:checked').val()
                },
                success: function (response) {
                    $('.cart-count').text(response['count']);
                    $('.cart-price').text(response['total'] + ' VNĐ');
                    $('.select-total h5').text(response['total'] + ' VNĐ');

                    var cartHover_tbody = $('.select-items tbody');
                    var cartHover_existItem = cartHover_tbody.find("tr" + "[data-rowId='" + response['cart'].rowId + "']");

                    if (cartHover_existItem.length) {
                        cartHover_existItem.find('.product-selected p').text(new Intl.NumberFormat().format(response['cart'].price.toFixed()) + 'VNĐ' + ' x ' + response['cart'].qty);
                    } else {
                        var newItem =
                            '<tr data-rowId="' + response['cart'].rowId + '">\n' +
                            '<td class="si-pic"><img width="70px" src="front/img/products/' + response['cart'].options.images[0].path + '" alt=""></td>\n' +
                            '<td class="si-text">\n' +
                            '  <div class="product-selected">\n' +
                            '        <h6>' + response['cart'].name + '<span> - '+ response['cart'].options['colorProduct'].color + '</span></h6>\n' +
                            '        <p>' + new Intl.NumberFormat().format(response['cart'].price.toFixed()) + ' VNĐ x ' + response['cart'].qty + '</p>\n' +
                            '    </div>\n' +
                            '</td>\n' +
                            '<td class="si-close">\n' +
                            '    <i onclick="removeCart(\'' + response['cart'].rowId + '\')" class="ti-close">\n' +
                            '    </i>\n' +
                            '</td>\n'
                        '</tr>';

                        cartHover_tbody.append(newItem);
                    }
                    color = ''
                    $('input[name="color"]:checked').parent().css("border-color","rgba(255, 255, 255, 0)")

                  alert('Thêm thành công\nSản phẩm: ' + response['cart'].name + ' - ' + response['cart'].options['colorProduct'].color);
                    console.log(response)
                },
                error: function (response) {
                    alert('Thêm thất bại! ');
                    console.log(response)
                },
            });
        }
    })
})
