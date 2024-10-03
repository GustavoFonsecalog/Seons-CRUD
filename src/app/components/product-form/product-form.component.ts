import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { ProductService } from '../../services/product.service';
import { CategoryService } from '../../services/category.service';

@Component({
  selector: 'app-product-form',
  templateUrl: './product-form.component.html',
  styleUrls: ['./product-form.component.css']
})
export class ProductFormComponent implements OnInit {
  product: any = { name: '', quantity: 0, category_id: null };  // Apenas um produto
  categories: any[] = [];  // Carregar as categorias
  productId: number | null = null;

  constructor(
    private productService: ProductService,
    private categoryService: CategoryService,
    private route: ActivatedRoute,
    private router: Router
  ) {}

  ngOnInit(): void {
    // Carregar categorias
    this.categoryService.getCategories().subscribe(data => {
      this.categories = data;
    });

    // Verificar se estamos editando um produto
    const id = this.route.snapshot.paramMap.get('id');
    this.productId = id !== null ? +id : null;
    if (this.productId) {
      this.productService.getProductById(this.productId).subscribe(product => {
        this.product = product;
      });
    }
  }

  // Salvar ou atualizar o produto
  saveProduct(): void {
    if (this.productId) {
      // Atualizar o produto
      this.productService.editProduct(this.productId, this.product).subscribe(() => {
        this.router.navigate(['/products']);
      });
    } else {
      // Criar um novo produto
      this.productService.createProduct(this.product).subscribe(() => {
        this.router.navigate(['/products']);
      });
    }
  }

  // Retornar à lista de produtos
  goBack(): void {
    this.router.navigate(['/products']);
  }
}
