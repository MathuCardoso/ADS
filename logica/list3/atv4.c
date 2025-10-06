#include <stdio.h>
#include <math.h>
int main()
{
    
    float num; 

    printf("Digite um numero: ");
    scanf("%f", &num);

    while (num == 0)
    {
        printf("Numero nulo, tente outro: ");
        scanf("%f", &num);
    }

    if (num > 0)
    {
        float raiz = sqrt(num);
        printf("A raiz quadrada de %.2f e %.2f", num, raiz);
    } else if(num < 0){
        float cubo = pow(num, 3);
        printf("%.2f elevado ao cubo e: %.2f", num, cubo);
    }

    return 0;
}
