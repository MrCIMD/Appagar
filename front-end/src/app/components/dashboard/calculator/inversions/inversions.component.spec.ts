import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { InversionsComponent } from './inversions.component';

describe('InversionsComponent', () => {
  let component: InversionsComponent;
  let fixture: ComponentFixture<InversionsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ InversionsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(InversionsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
