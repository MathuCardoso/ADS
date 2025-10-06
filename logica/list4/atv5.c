#include <stdio.h>
#include <ctype.h>
#include <locale.h>
#include <stdlib.h>
int main()
{
    system("chcp 65001 > nul");
    setlocale(LC_ALL,"utf8");

    float valorCompra, parcelas, valorFinal, dif;
    int pagamento;

    printf("Qual foi o valor da compra?");
    scanf(" %f", &valorCompra);

    printf("Perfeito! Agora escolha uma forma de pagamento:\n");
    printf("[1] Pagamento à vista - 15%% de desconto sobre o valor total da compra.\n");
    printf("[2] Pagamento com cheque pré-datado para 30 dias - 10%% de desconto sobre o valor total da compra.\n");
    printf("[3] Pagamento parcelado em 3 vezes - 5%% de desconto sobre o valor total da compra.\n");
    printf("[4] Pagamento parcelado em 6 vezes - não tem desconto.\n");
    printf("[5] Pagamento parcelado em 12 vezes - 8%% de acréscimo sobre o valor total da compra.\n");
    scanf("%d", &pagamento);

    switch (pagamento)
    {
    case 1:
        valorFinal = valorCompra * 0.85;
        dif = valorCompra - valorFinal;
        printf("Pagamento à vista escolhido! Você receberá 15%% de desconto.\n");
        printf("Valor inicial da compra: R$%.2f\nValor após o desconto: R$%.2f.\n", valorCompra, valorFinal);
        printf("A diferença do valor final da compra para o seu valor antes do desconto é de R$%.2f.", dif);

    break;

    case 2:
        valorFinal = valorCompra * 0.90;
        dif = valorCompra - valorFinal;
        printf("Pagamento com cheque pré-datado para 30 dias escolhido! Você receberá 10%% de desconto.\n");
        printf("Valor inicial da compra: R$%.2f\nValor após o desconto: R$%.2f.\n", valorCompra, valorFinal);
        printf("A diferença do valor final da compra para o seu valor antes do desconto é de R$%.2f.", dif);
    break;

    case 3:
        valorFinal = valorCompra * 0.95;
        dif = valorCompra - valorFinal;
        printf("Pagamento parcelado em 3 vezes escolhido! Você receberá 5%% de desconto.\n");
        printf("Valor inicial da compra: R$%.2f\nValor após o desconto: R$%.2f.\n", valorCompra, valorFinal);
        parcelas = valorFinal / 3;
        printf("As parcelas serão de R$%.2f\n", parcelas);
        printf("A diferença do valor final da compra para o seu valor antes do desconto é de R$%.2f.", dif);

    break;

    case 4:
        printf("Pagamento parcelado em 6 vezes escolhido! Você NÃO receberá desconto.\n");
        printf("Valor final da compra: R$%.2f\nNenhum desconto aplicado.\n", valorCompra);
        parcelas = valorCompra / 6;
        printf("As parcelas serão de R$%.2f", parcelas);

    break;

    case 5:
        valorFinal = valorCompra * 1.08;
        dif = valorCompra - valorFinal;
        printf("Pagamento parcelado em 12 vezes escolhido! Serão aplicado juros de 8%% ao final da compra.\n");
        printf("Valor inicial da compra: R$%.2f\nValor após a aplicação dos juros: R$%.2f.\n", valorCompra, valorFinal);
        printf("A diferença do valor da compra para o seu valor final é de R$%.2f.\n", dif);
        parcelas = valorFinal / 12;
        printf("As parcelas serão de R$%.2f", parcelas);
    break;
    
    default:
        printf("Opção inválida! Escolha uma opção de 1 a 5.");
    break;
    }

    return 0;
}
